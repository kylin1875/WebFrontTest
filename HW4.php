<!DOCTYPE HTML>  
<html>  
<head>  
	<meta charset="utf-8"/>  
	<title>Hw4</title>  
	<script type="text/javascript">
	//打开数据库  
var db = openDatabase('contactdb','','local database demo',204800);  
  
//保存数据  
function save(){  
	var user_color = document.getElementById("user_color").value;  
	var user_number = document.getElementById("user_number").value;  
	//创建时间  
	var time = new Date().getTime();  
	db.transaction(function(tx){  
		tx.executeSql('insert into hw values(?,?,?)',[user_color,user_number,time],onSuccess,onError);  
	});  
}  
 //sql语句执行成功后执行的回调函数  
function onSuccess(tx,rs){  
	alert("Execute success");  
	loadAll();  
}  
//sql语句执行失败后执行的回调函数  
function onError(tx,error){  
	alert("Failed，error information："+ error.message);  
}  
//将所有存储在sqlLite数据库中的联系人全部取出来  
function loadAll(){  
	var list = document.getElementById("list");  
	db.transaction(function(tx){  
		//如果数据表不存在，则创建数据表  
		tx.executeSql('create table if not exists hw(color text,number text,createtime INTEGER)',[]);  
		//查询所有记录  
		tx.executeSql('select * from hw',[],function(tx,rs){  
		   if(rs.rows.length>0){  
				var result = "<table>";  
				result += "<tr><th>##</th><th>Color</th><th>Number</th><th>Add time</th><th>Operation</th></tr>";  
				for(var i=0;i<rs.rows.length;i++){  
					var row = rs.rows.item(i);  
					//转换时间，并格式化输出  
					var time = new Date();  
					time.setTime(row.createtime);  
					var timeStr = time.format("yyyy-MM-dd hh:mm:ss");  
					//拼装一个表格的行节点  
					result += "<tr><td>"+(i+1)+"</td><td>"+row.color+"</td><td>"+row.number+"</td><td>"+timeStr+"</td><td><input type='button' value='Delete' onclick='del("+row.number+")'/></td></tr>"; 
					"</br><tr><td><input type='button' value='Drop' onclick='drop()'/></td></tr>";
				}  
				list.innerHTML = result;  
		   }else{  
				list.innerHTML = "Database is empty,please enter information";  
		   }   
		});  
	});  
}  
//drop table
function drop(){  
db.transaction(function () {
	tx.executeSql('DROP TABLE hw');
});
} 
//删除信息  
function del(number){  
	 db.transaction(function(tx){  
		//注意这里需要显示的将传入的参数number转变为字符串类型  
		tx.executeSql('delete from hw where number=?',[String(number)],onSuccess,onError);  
	});  
}  
//格式化时间的format函数
Date.prototype.format = function(format)  
{  
	var o = {  
	"M+" : this.getMonth()+1, //month  
	"d+" : this.getDate(),    //day  
	"h+" : this.getHours(),   //hour  
	"m+" : this.getMinutes(), //minute  
	"s+" : this.getSeconds(), //second  
	"q+" : Math.floor((this.getMonth()+3)/3),  //quarter  
	"S" : this.getMilliseconds() //millisecond  
	}  
	if(/(y+)/.test(format)) format=format.replace(RegExp.$1,  
	(this.getFullYear()+"").substr(4 - RegExp.$1.length));  
	for(var k in o)if(new RegExp("("+ k +")").test(format))  
	format = format.replace(RegExp.$1,  
	RegExp.$1.length==1 ? o[k] :  
	("00"+ o[k]).substr((""+ o[k]).length));  
	return format;  
}  
	</script>
	<style>  
		.addDiv{  
			border: 2px dashed #ccc;  
			width:400px;  
			text-align:center;  
		}  
		th {  
	font: bold 11px , Verdana, Arial, Helvetica, sans-serif;  
	color: #4f6b72;  
	border-right: 1px solid #C1DAD7;  
	border-bottom: 1px solid #C1DAD7;  
	border-top: 1px solid #C1DAD7;  
	letter-spacing: 2px;  
	text-transform: uppercase;  
	text-align: left;  
	padding: 6px 6px 6px 12px;  
}  
td {  
	border-right: 1px solid #C9DAD7;  
	border-bottom: 1px solid #C9DAD7;  
	background: #fff;  
	padding: 6px 6px 6px 12px;  
	color: #4f6b72;  
}  
	</style>  
</head>  
<body onload="loadAll()">  
	<div class="addDiv">     
		<label for="user_color">Color：</label>  
		<input type="color" id="user_color" name="user_color" pattern="^#(?:[0-9a-fA-F]{3}){1,2}$" class="text" required/>  
		<br/>  
		<label for="user_number">Number：</label>  
		<input type="number" id="user_number" name="user_number" pattern="\d*" min="1" max="130" title="Numbers only" required/>
		<p>Numbers can only between 1 to 130</p>  
		<br/>  
		<input type="button" onclick="save()" value="SAVE"/>  
	</div>  
	<br/>  
	<div id="list">  
	</div>  
</body>  
</html>  