<?php
// nos aseguramos que este logeado el usuario y sea un administrador para poder agregar otro usuario y como el formulario no tiene ningun action la pagina se va a autoprocesar y entonces se va a hacer la proxima validacion
if ($_POST['r']=='movie-add' && $_SESSION['role']=='Admin' && !isset($_POST['crud'])) {print('
  <h2 class="p1">Agregar serie o pelicula</h2>
    <form method="POST" class="item-article"  autocomplete="on">
      <div class="p_25">
        <input class="pruebaInp" type="text" name="user" placeholder="nombre de usuario"autofocus required>
      </div>
      <div class="p_25">
        <input type="email" name="email" placeholder="email" required>
      </div>
      <div class="p_25">
        <input type="text" name="name" placeholder="nombre" required>
      </div>
      <div class="p_25">
        <input type="text" name="birthday" placeholder="cumpleaños" required>
      </div>
      <div class="p_25">
        <input  autocomplete="off" type="password" name="pass" placeholder="password" required>
      </div>
      <div class="p_25">
        <input type="radio" name="role" id="Admin" value="Admin" required>
          <label for="admin">Administrador</label>
        <input type="radio" name="role" id="noadmin" value="User" required>
          <label for="noadmin">Usuario</label>
      </div>
      <div class="p_25">
        <input type="submit" class="button add"  value="agregar">
        <input type="hidden" name="r" value="user-add">
        <input type="hidden" name="crud" value="set">
      </div>
    </form>
  ');
 
}elseif ($_POST['r']=='movie-add' && $_SESSION['role']=='Admin' && $_POST['crud']=='set') {
  //programar la inserción
  $users_controller=new UsersController();
  $new_user= array(
    'user'=>$_POST['user'],
    'email'=> $_POST['email'],
    'name'=>$_POST['name'],
    'birthday'=>$_POST['birthday'],
    'pass'=>$_POST['pass'],
    'role'=>$_POST['role']
);
$user= $users_controller->set($new_user);
$templete='
 <div class="conteinar">
 <p class="item add">Usuario: <b>%s</b> agregado</p>
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
