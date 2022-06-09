<?php
print('<h2 class="p1"> gestion de status</h2>');

$status_controller =new StatusController();
$status= $status_controller->get();

if(empty($status)){
  print(' <div class="item error">No hay Status</p>
  </div>');
}else {
  $templete_status='
  <div class="container-table">
  <div class="item-table">
  <table>
   <tr>
    <th>Id</th>
    <th>Status</th>
     <th colspan="2">
      <form action="" method="POST">
      <input type="hidden" name="r" value="status-add">
      <input type="submit" class="button add" value="agregar">
      </form>
     </th>
   </tr>  ';
  for ($n=0; $n < count($status) ; $n++) { 
    $templete_status .= '
   <tr>
    <td>'.$status[$n]['status_id'] .'</td>
    <td>'.$status[$n]['status'] .'</td>
     <td>
      <form action="" method="POST">
      <input type="hidden" name="r" value="status-edit">
      <input type="hidden" name="status_id" value="'.$status[$n]['status_id'] .'">
      <input type="submit" class="button edit" value="Editar">
      </form>
     </td>
          <td>
      <form action="" method="POST">
      <input type="hidden" name="r" value="status-delete">
      <input type="hidden" name="status_id" value="'.$status[$n]['status_id'] .'">
      <input type="submit" class="button delete" value="Eliminar">
      </form>
     </td>
   </tr> ';
  }
  $templete_status  .='
  </table>
</div>
</div>
  ';
  print($templete_status);
}

