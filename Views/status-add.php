<?php
// nos aseguramos que este logeado el usuario y sea un administrador para poder agregar otro usuario y como el formulario no tiene ningun action la pagina se va a autoprocesar y entonces se va a hacer la proxima validacion
if ($_POST['r']=='status-add' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {print('
  <h2 class="p1">Agregar usuario</h2>
<form method="POST" class="item-article">
  <div class="p_25">
    <input type="text" name="status" placeholder="status" required>
  </div>
  <div class="p_25">
    <input type="submit" class="button add" value="agregar">
    <input type="hidden" name="r" value="status-add">
     <input type="hidden" name="crud" value="set">
  </div>
</form>
  ');
 
}elseif ($_POST['r']=='status-add' && $_SESSION['role']=='Admin' && $_POST['crud']=='set') {
  //programar la inserción
  $status_controller=new StatusController();
  $new_status= array(
    'status_id'=>0,
    'status'=>$_POST['status']
);
$status= $status_controller->set($new_status);
$templete='
 <div class="conteinar">
 <p class="item add">Status <b>%s</b> salvado</p>
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
