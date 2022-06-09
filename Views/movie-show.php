<?php
if($_POST['r']=='movie-show' && isset($_POST['imdb_id']) ){
  $ms_controller = new MovieController();
  $ms =$ms_controller->get($_POST['imdb_id']);
  if (empty($ms)) {
    printf('
  <div class="container">
      <p class="item error">Error al cargar la pelicula o serie <b>%S</b></p>
  </div>
    ',$_POST['imdb_id']);
  } else {
    $templete_ms= '
    <div class="item movieserie-info">
  <h2 class="p_5">%s</h2>
  <p class="p_5">%s</p>
  <p class="_5">
        <small class="block">(%s)</small>
        <small class="block">%s</small>
        <small class="block">%s</small>
        <small class="block">%s</small>
        <small class="block">%s</small>
        <small class="block">%s</small>
  </p>
  <img src="%s" alt="" class="p_5 poster">
  <p class="p_5">Author: <b>%s</b></p>
  <p class="p_5">Actors: <b>%s</b></p>
  <article class="p_5 ph7 mauto left">%s</article>
  <div class="p_5 trailer">
    <iframe src="%s" frameborder="0" allowfullscreen></iframe>
    </div>
    <input type="button" class="p_5 button add" value="Regresar" onclick="history.back()">
  </div>   
    ';  
       $trailer =str_replace('watch?v=','embed/',$ms[0]['trailer']);
    printf($templete_ms,
    $ms[0]['title'],
     $ms[0]['genres'],
     $ms[0]['imdb_id'],
     $ms[0]['status'],
     $ms[0]['category'],
     $ms[0]['country'],
    $ms[0]['premiere'] ,
    $ms[0]['rating'],
    $ms[0]['poster'],
    $ms[0]['author'],
      $ms[0]['actors'],
    $ms[0]['plot'],
    $trailer
  );
  }
  

}else {
  $controller = new ViewController();
  $controller->load_view('error404');
}
