<!DOCTYPE HTML>
<html>
<head>
<title>HW3:Tic-Tac-Toe</title>
<style>
#div1, #div2,#div3, #div4,#div5, #div6,#div7, #div8,#div9,#div10,#div11
{float:left; width:100px; height:35px; 
 margin:10px;padding:10px;border:1px 
 solid #aaaaaa;}
</style>

<script>
function allowDrop(ev) {
	ev.preventDefault();
}

function drag(ev) {
	ev.dataTransfer.setData("text", ev.target.id);
}

function dropcopy(ev) {
	ev.preventDefault();
	var data = ev.dataTransfer.getData("text");
	var copyimg = document.createElement("img");
	var original = document.getElementById(data);
	copyimg.src=original.src;
	copyimg.width=88;
	copyimg.height=31;
	ev.target.appendChild(copyimg);
}
</script>

</head>
<body>

<br>
<table align="right" border="1">
<tr>
<td><div id="div1" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div2" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div3" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
</tr>
<tr>
<td><div id="div4" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div5" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div6" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
</tr>
<tr>
<td><div id="div7" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div8" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
<td><div id="div9" ondrop="dropcopy(event)" ondragover="allowDrop(event)"></div></td>
</tr>
</table>

<br>
<table align="left" border="1">
<tr>
<td><div id="div10" ondrop="drop(event)" ondragover="allowDrop(event)">
	<img src="x.gif" draggable="true" ondragstart="drag(event)" 
	 id="drag1" width="88" height="31"></div></td>
</tr>
<tr>
<td><div id="div11" ondrop="drop(event)" ondragover="allowDrop(event)">
	<img src="o.gif" draggable="true" ondragstart="drag(event)" 
	 id="drag2" width="88" height="31"></div></td>
</tr>
</table>

<br>
<p align="center">Welcome to play Tic-Tac-Toe.</p>
<p align="center">Drag and Drop from left to right to play this game.</p>


</body>
</html>