<?php
$users_controller=new UsersController();
if ($_POST['r']=='user-edit' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {
  $user=$users_controller->get($_POST['user']);
  if(empty($user)){
      $templete='
      <div class="conteinar">
      <p class="item add">No existe el usuario <b>%s</b>     </p>
      </div>
      <script> 
       window.onload = function (){
         reloadPage("usuarios") 
      }


       </script>
      ';
      printf($templete.$_POST['user']);
  }else{
    $role_admin = ($user[0]['role']=='Admin')?'checked':'';
    $role_user= ($user[0]['role']=='User')?'checked':'';
    $templete_user= '
      <h2 class="p1">Editar Usuario </h2>
      <form method="POST" class="item"  autocomplete="on">
        <div class="p_25">
          <input type="text" placeholder="usuario"  value="%s"   disabled required>
          <input type="hidden" name="user" value="%s">
      </div>
       <div class="p_25">
        <input type="email" name="email" placeholder="email" value="%s" required>
      </div>
      <div class="p_25">
        <input type="text" name="name" placeholder="nombre"  value="%s" required>
      </div>
      <div class="p_25">
        <input type="text" name="birthday" placeholder="cumpleaños" value="%s" required>
      </div>
      <div class="p_25">
        <input  autocomplete="off" type="password" name="pass" placeholder="password" value="" required>
      </div>
      <div class="p_25">
        <input type="radio" name="role" id="Admin" value="Admin" %s required >
          <label for="Admin">Administrador</label>
        <input type="radio" name="role" id="noadmin" value="User" %s required >
          <label for="noadmin">Usuario</label>
      </div>
      <div class="p_25">
        <input type="submit" class="button edit"  value="editar">
        <input type="hidden" name="r" value="user-edit">
        <input type="hidden" name="crud" value="set"
      </div>
    </form>';
//los input disable php los ignora y no toma el valor que contenga
   printf(
     $templete_user,
     $user[0]['user'],
     $user[0]['user'],
     $user[0]['email'],
      $user[0]['name'],
     $user[0]['birthday'],
     $user[0]['pass'],
     $role_admin,
     $role_user
  );
}

}elseif ($_POST['r']=='user-edit' && $_SESSION['role']=='Admin' && $_POST['crud']=='set') {
  //programar la inserción
  $users_controller=new UsersController();
  $save_user= array(
    'user'=>$_POST['user'],
    'email'=> $_POST['email'],
    'name'=>$_POST['name'],
    'birthday'=>$_POST['birthday'],
    'pass'=>$_POST['pass'],
    'role'=>$_POST['role']
);
$user= $users_controller->set($save_user);
$templete='
 <div class="conteinar">
 <p class="item edit">Usuario: <b>%s</b> cambiado</p>
 </div>
 <script> 
   window.onload = function (){
      reloadPage("usuarios") 
  }


 </script>
';
printf($templete,$_POST['user'] );

}else {
  //para generar vista de no autorizado
  $controller = new ViewController();
  $controller->load_view('error401');
}
