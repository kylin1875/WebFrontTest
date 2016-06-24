<html>
<head>
<title>HTML Calculator</title>
CALCULATOR
</head>
<style>  
form {  
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
input {  
	border-right: 1px solid #C9DAD7;  
	border-bottom: 1px solid #C9DAD7;  
	background: #fff;  
	padding: 6px 6px 6px 12px;  
	color: #4f6b72;  
}  
</style>
<br>
<body bgcolor= "white" text= "Blue">
<form name="calculator" >
<br><input type="textfield" name="ans" value=""><br>
<input type="button" value="1" onClick="document.calculator.ans.value+='1'">
<input type="button" value="2" onClick="document.calculator.ans.value+='2'">
<input type="button" value="3" onClick="document.calculator.ans.value+='3'"><br>
<input type="button" value="4" onClick="document.calculator.ans.value+='4'">
<input type="button" value="5" onClick="document.calculator.ans.value+='5'">
<input type="button" value="6" onClick="document.calculator.ans.value+='6'"><br>
<input type="button" value="7" onClick="document.calculator.ans.value+='7'">
<input type="button" value="8" onClick="document.calculator.ans.value+='8'">
<input type="button" value="9" onClick="document.calculator.ans.value+='9'"><br>
<input type="button" value="+" onClick="document.calculator.ans.value+='+'">
<input type="button" value="-" onClick="document.calculator.ans.value+='-'">
<input type="button" value="*" onClick="document.calculator.ans.value+='*'">
<input type="button" value="/" onClick="document.calculator.ans.value+='/'">
<input type="button" value="0" onClick="document.calculator.ans.value+='0'"><br>
<input type="reset" value="Reset">
<input type="button" value="=" onClick="document.calculator.ans.value=eval(document.calculator.ans.value)">
</form>
</body>
</html>