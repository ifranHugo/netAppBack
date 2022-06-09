<?php

class SessionController{
  private $sesion;
  public function __construct(){
    $this->session = new UsersModel();
  }

  public function login($user, $pass){
    //la variable session al invocar UserModels puede invocar tambien sus metodos, entonces login ejecuta en el modelo de usuario el metodo validate_user, para llamar esta funcion 
    return $this->session->validate_user($user,$pass);
  }
  public function logout(){
    session_start();
    session_destroy();
    header('Location: ./');

  }
}