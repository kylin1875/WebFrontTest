<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Media queries - Chapter 03</title>
	<style>
	body { text-align: center; }
	iframe { border: none; }
	@media (max-width: 480px) {
		iframe {
			display: block;
		}
	}
	</style>
</head>
<body>
<script>
	var width = window.innerWidth;
	var height = window.innerHeight;
	alert("width is: " + width + "\nheight is: " + height);
</script>
	<iframe src="w3schools.html" height="800" scrolling="no" width="300"></iframe>
	<iframe src="w3schools.html" height="600" scrolling="no" width="400"></iframe>
	<iframe src="w3schools.html" height="600" scrolling="no" width="500"></iframe>
</body>
</html>