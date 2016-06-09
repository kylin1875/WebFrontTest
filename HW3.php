<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<div id="drag-coveredup" class="dragdemo" draggable="true">drag me</div>
		<div id="coverup"></div>
		<style>
		#coverup {
			background: white;
			width: 170px;
			height: 100px;
			position: absolute;
			top: 0;
			right: 0;
			z-index: 2;
		}
		</style>
		<script>
		document.getElementById("drag-coveredup").addEventListener("dragstart", function(e) {
			var crt = this.cloneNode(true);
			crt.style.backgroundColor = "red";
			crt.style.position = "absolute"; crt.style.top = "0px"; crt.style.right = "0px";
			document.body.appendChild(crt);
			e.dataTransfer.setDragImage(crt, 0, 0);
		}, false);
		</script>
	</body>
</html>