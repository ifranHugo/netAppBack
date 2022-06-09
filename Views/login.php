<?php
print('
<form class="item" method="post">
  <div class="form-user">
    <input type="text" name ="user" placeholder="usuario"require>
  </div>
  <div class="form-user">
    <input type="password" name="pass" placeholder="password" require>
  </div>
  <div class="form-user">
    <input type="submit" class="button" value="enviar">
  </div>
</form>');

 if(isset($_GET['error'])){
  $templete='  <div class="container">
    <p class="item error">%s</p>
  </div>';
  printf($templete,$_GET['error']);
} 