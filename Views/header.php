<?php

print('
<!DOCTYPE html>
<html class="html-cont">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Public/css/netflix.css">
  <link rel="stylesheet" href="http://jonmircha.github.io/responsimple/css/responsimple.min.css">

</head>

<body>
	<header class="header-cont">
		<div class="div-logo">
			<h1 class="logo">Netflix</h1>
		</div>
');
if($_SESSION['ok']){
  print('		<nav class="nav">
			<ul class="nav-ul">
				<li class="li-menu"><a href="./">inicio</a></li>
				<li class="li-menu"><a href="movieseries">movieseries</a></li>
				<li class="li-menu"><a href="usuarios">usuarios</a></li>
				<li class="li-menu"><a href="status">status</a></li>
				<li class="li-menu"><a href="salir">salir</a></li>
			</ul>
		</nav>');
}
print('</header>
<main class="">');
