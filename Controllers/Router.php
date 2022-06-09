<?php
class Router {
	public $route;
	
	public function __construct($route){
		

    $options = array('use_only_cookies' =>1,
				'auto_start'=>1,
				'read_and_close'=>true);
    if (!isset($_SESSION)){
       session_start($options);
    }
		
		if (!isset($_SESSION['ok'])) $_SESSION['ok']=false;		
		/*session_start() crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.*/

  if ($_SESSION['ok']){
     $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
      $controller =new VIewController();
        switch ($this->route) {
          case 'home':
            $controller->load_view('home');
            break;
          case 'movieseries': 
              if(!isset($_POST['r']))$controller->load_view('movies');
            else if ($_POST['r']=='movie-show')$controller->load_view('movie-show');
            break;
          case 'usuarios':
            if(!isset($_POST['r']))$controller->load_view('users');
            else if($_POST['r']=='user-add')$controller->load_view('user-add');
            else if ($_POST['r']=='user-edit')$controller->load_view('user-edit');
            else if ($_POST['r']=='user-delete')$controller->load_view('user-delete');
            break;
          case 'status':
            if(!isset($_POST['r']))$controller->load_view('status');
            else if($_POST['r']=='status-add')$controller->load_view('status-add');
            else if ($_POST['r']=='status-edit')$controller->load_view('status-edit');
            else if ($_POST['r']=='status-delete')$controller->load_view('status-delete');
            break;
          case 'salir':
            $user_session = new SessionController();
            $user_session->logout();
            break;
          default:
            $controller->load_view('error404');
            break;
        }

      }else  {
        if (!isset($_POST['user']) &&  !isset($_POST['pass'])){
            $login_form = new ViewController();
            $login_form ->load_view('login');	
        }else {
          $user_session= new SessionController();
          //como user_session es una instancia de Session controler puede ejecutar login que a su ves ejecuta el metodo validate_user que esta en UserModels
          $session =$user_session->login($_POST['user'],$_POST['pass']);
          // si es incorrecto devuelve un arreglo vacio, y redirecciona a un formulario de registro, 
          
          //empty — Determina si una variable está vacía
          if (empty($session)){
            $login_form = new ViewController();
            $login_form->load_view('login');
            //header permita mandar cabeceras y con location permite redirigir el flojo de la aplicacion con get
            header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password proporcionado no coinciden');
          }else{
            //cuando la session 'ok' es true osea que si tiene un usuario
            $_SESSION['ok']= true;
              foreach ($session as $row) {
                //variables de session
                $_SESSION['user']=$row['user'];
                $_SESSION['email']=$row['emailname'];
                $_SESSION['name']=$row['name'];
                $_SESSION['birthday']=$row['birthday'];
                $_SESSION['pass']=$row['pass'];
                $_SESSION['role']=$row['role'];
              }
            header('Location: ./');

          }
          
        }
              



      }		
    }

}