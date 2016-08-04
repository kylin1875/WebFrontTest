<!DOCTYPE html>
<html>
<head>
<style>
div.container {
		width: 100%;
		border: 1px solid gray;
}

header, footer {
		padding: 0.5em;
		color: white;
		background-color: black;
		clear: left;
		text-align: center;
}

nav {
		float: left;
		max-width: 30％;
		margin: 0;
		padding: 1em;
}

nav ul {
		list-style-type: none;
		padding: 0;
}
	 
nav ul a {
		text-decoration: none;
}

article {
		margin-left: 100px;
		border-left: 1px solid gray;
		padding: 1em;
		overflow: hidden;
}
@media (width: 400px) {
	 body { border-style: solid; }
} /* ---------------- (1) */
@media (min-width: 450px) {
	 body { border-style: dotted; }
} /* ---------------- (2) */
@media (max-width: 350px) {
	 body { border-style: dashed; }
} /* ---------------- (3) */ 
</style>
</head>
<body>

<div class="container">

<header>
	 <h1>City Gallery</h1>
</header>
	
<nav>
	<ul>
		<li><a href="#">London</a></li>
		<li><a href="#">Paris</a></li>
		<li><a href="#">Tokyo</a></li>
	</ul>
</nav>

<article>
	<h1>London</h1>
	<p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
	<p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
</article>

<footer>Copyright © W3Schools.com</footer>

</div>

</body>
</html>
