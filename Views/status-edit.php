<?php
$status_controller=new StatusController();
if ($_POST['r']=='status-edit' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {
  $status=$status_controller->get($_POST['status_id']);
  if(empty($status)){
      $templete='
      <div class="conteinar">
      <p class="item add">No existe el status_id <b>%s</b>     salvado</p>
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
      <h2 class="p1">Editar Status </h2>
      <form method="POST" class="item">
        <div class="p_25">
        <input type="text" placeholder="status_id" value="%s"     disabled required>
        <input type="hidden" name="status_id" value="%s">
      </div>
      <div class="p_25">
        <input type="text" name="status" placeholder="status"     value="%s" required>
      </div>
      <div class="p_25">
        <input type="submit" class="button edit" value="Editar">
        <input type="hidden" name="r" value="status-edit">
        <input type="hidden" name="crud" value="set">
      </div>
      </form>';
//los input disable php los ignora y no toma el valor que contenga
   printf(
     $templete_status,
     $status[0]['status_id'],
     $status[0]['status_id'],
     $status[0]['status'],
  );
}

}elseif ($_POST['r']=='status-edit' && $_SESSION['role']=='Admin' && $_POST['crud']=='set') {
  //programar la inserción
  $status_controller=new StatusController();
  $save_status= array(
    'status_id'=>$_POST['status_id'],
    'status'=>$_POST['status']
);
$status= $status_controller->set($save_status);
$templete='
 <div class="conteinar">
 <p class="item edit">Status <b>%s</b> editado</p>
 </div>
 <script> 
   window.onload = function (){
      reloadPage("status") 
  }


 </script>
';
printf($templete,$_POST['status'] );

}else {
  //para generar vista de no autorizado
  $controller = new ViewController();
  $controller->load_view('error401');
}
