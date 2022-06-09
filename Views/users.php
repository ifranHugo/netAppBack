<?php
print('<h2 class="p1"> gestion de usuario</h2>');

$users_controller =new UsersController();
$user= $users_controller->get();

if(empty($user)){
  print(' <div class="item error">No hay Usuarios</p>
  </div>');
}else {
  $templete_users='
  <div class="container-table">
  <div class="item-table">
  <table>
   <tr>
    <th>Usuario</th>
    <th>Correo</th>
    <th>Nombre</th>
    <th>Cumpleaños</th>
    <th>Contraseña</th>
    <th>Rol</th>
     <th colspan="2">
      <form action="" method="POST">
        <input type="hidden" name="r" value="user-add">
        <input type="submit" class="button add" value="agregar">
      </form>
     </th>
   </tr>  ';
  for ($n=0; $n < count($user) ; $n++) { 
    $templete_users .= '
   <tr>
    <td>'. $user[$n]['user'] .'</td>
    <td>'. $user[$n]['email'] .'</td>
    <td>'. $user[$n]['name'] .'</td>
    <td>'. $user[$n]['birthday'] .'</td>
    <td>'. $user[$n]['pass'] .'</td>
    <td>'. $user[$n]['role'] .'</td>

     <td>
      <form action="" method="POST">
      <input type="hidden" name="r" value="user-edit">
      <input type="hidden" name="user" value="'.$user[$n]['user'] .'">
      <input type="submit" class="button edit" value="Editar">
      </form>
     </td>
          <td>
      <form action="" method="POST">
      <input type="hidden" name="r" value="user-delete">
      <input type="hidden" name="user" value="'.$user[$n]['user'] .'">
      <input type="submit" class="button delete" value="Eliminar">
      </form>
     </td>
   </tr> ';
  }
  $templete_users .='
  </table>
</div>
</div>
  ';
  print($templete_users);
}

