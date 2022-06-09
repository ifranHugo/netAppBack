<?php
print('<h2 class="p1"> gestion de movieseries</h2>');

$ms_controller =new movieController();
$ms= $ms_controller->get();

if(empty($ms)){
  print(' <div class="item error">No hay peliculas ni series</p>
  </div>');
}else {
  $templete_ms='
  <div class="container-table">
  <div class="item-table">
  <table>
   <tr>
    <th>IMDB Id</th>
    <th>Título</th>
    <th>Estreno</th>
    <th>Género</th>
    <th>Categoria</th>
     <th colspan="2">
     </th>
   </tr>  ';
  for ($n=0; $n < count($ms) ; $n++) { 
    $templete_ms .= '
   <tr>
    <td>'. $ms[$n]['imdb_id'] .'</td>
    <td>'. $ms[$n]['title'] .'</td>
    <td>'. $ms[$n]['premiere'] .'</td>
    <td>'. $ms[$n]['genres'] .'</td>
    <td>'. $ms[$n]['status'] .'</td>
    <td>'. $ms[$n]['category'] .'</td>
     <td>
      <form action="" method="POST">
        
        <input type="hidden" name="r" value="movie-show">
        <input type="hidden" name="imdb_id" value="'.$ms[$n]['imdb_id'] .'">
        <input type="submit" value="Mostrar" class="button show">
      </form>
      

    </td>
   </tr> ';
  }
  $templete_ms .='
  </table>
</div>
</div>
  ';
  print($templete_ms);
}


