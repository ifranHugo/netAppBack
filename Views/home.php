<?php

$template = '
<article class="item-article">
  <h2 class=p1>hola %s, Bienvenido a netflix</h2>
  <h3 class=p1>Tus Peliculas Y Series Favoritas<h3>
  <p class="p1 f1_25"> Tu nombre es <b>%s</b></p>
  <p class="p1 f1_25"> Tu email es %s</p>
  <p class="p1 f1_25"> Tu cumpleaños es <b>%s</b></p>
  <p class="p1 f1_25"> Tu Perfile de usuario tiene un nivel de<b>%s</b></p>
 
</article>';


printf($template,$_SESSION['user'],$_SESSION['name'],$_SESSION['email'],$_SESSION['birthday'],$_SESSION['role']);