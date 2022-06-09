<?php
$users_controller=new UsersController();
if ($_POST['r']=='user-delete' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {
  $user=$users_controller->get($_POST['user']);
  // preguntamos si existe tal estatus a editar y comprobamos si viene vacio mandamos la notificacion
  if(empty($user)){
      $templete='
      <div class="conteinar">
            <p class="item add">No existe el usuario<b>%s</b> </p>
      </div>
      <script> 
       window.onload = function (){
         reloadPage("usuarios") 
      }


       </script>
      ';
      printf($templete.$_POST['user']);
  }else{
    $templete_user= '
      <h2 class="p1">Eliminar Usuario </h2>
     <form method="POST" class="item" >
     <div class="p_1 f2">
       <p>¿Estas seguro de que quiere Eliminar el Usuario:
       <mark class="p1">%s</mark></p>
     </div>
     <div class="p_25">
    <input type="submit" class="button delete"    value="Eliminar">
    <input type="button" class="button add" value="NO" onclick="history.back()">
       <input type="hidden" name="user" value="%s">
    <input type="hidden" name="r" value="user-delete">
    <input type="hidden" name="crud" value="del">
     </div>
   </form>
  ';
    //los input disable php los ignora y no toma el valor que contenga
   printf(
     $templete_user,
     $user[0]['user'],
     $user[0]['user'],
     
  );
}

}elseif ($_POST['r']=='user-delete' && $_SESSION['role']=='Admin' && $_POST['crud']=='del') {
  //programar la inserción
        $users_controller=new UsersController();
      $user= $users_controller->del($_POST['user']);
      $templete='
      <div class="conteinar">
      <p class="item delete">Usuario: <b>%s</b> eliminado</p>
      </div>
      <script> 
        window.onload = function (){
            reloadPage("usuarios") 
        }


      </script>
      ';
      printf($templete,$_POST['user']);

}else {
  //para generar vista de no autorizado
  $controller = new ViewController();
  $controller->load_view('error401');
}
