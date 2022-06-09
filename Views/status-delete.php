<?php
$status_controller=new StatusController();
if ($_POST['r']=='status-delete' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {
  $status=$status_controller->get($_POST['status_id']);
  // preguntamos si existe tal estatus a editar y comprobamos si viene vacio mandamos la notificacion
  if(empty($status)){
      $templete='
      <div class="conteinar">
            <p class="item add">No existe el status_id<b>%s</b>     salvado</p>
      </div>
      <script> 
       window.onload = function (){
         reloadPage("status") 
      }


       </script>
      ';
      printf($templete.$_POST['status_id']);
  }else{
    $templete_status= '
      <h2 class="p1">Eliminar Status </h2>
     <form method="POST" class="item"  autocomplete="on">
     <div class="p_1 f2">
       <p>¿Estas seguro de que quiere Eliminar el status:</p>
       <mark class="p1">%s</mark>
     </div>
     <div class="p_25">
    <input type="submit" class="button delete"    value="Eliminar">
    <input type="button" class="button add" value="NO" onclick="history.back()">
       <input type="hidden" name="status_id" value="%s">
    <input type="hidden" name="r" value="status-delete">
    <input type="hidden" name="crud" value="del">
     </div>
   </form>
  ';
    //los input disable php los ignora y no toma el valor que contenga
   printf(
     $templete_status,
     $status[0]['status'],
     $status[0]['status_id'],
     
  );
}

}elseif ($_POST['r']=='status-delete' && $_SESSION['role']=='Admin' && $_POST['crud']=='del') {
  //programar la inserción
        $status_controller=new StatusController();
      $status= $status_controller->del($_POST['status_id']);
      $templete='
      <div class="conteinar">
      <p class="item delete">Status <b>%s</b> eliminado</p>
      </div>
      <script> 
        window.onload = function (){
            reloadPage("status") 
        }


      </script>
      ';
      printf($templete,$_POST['status_id']);

}else {
  //para generar vista de no autorizado
  $controller = new ViewController();
  $controller->load_view('error401');
}
