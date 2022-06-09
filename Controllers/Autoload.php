
<?php
class Autoload{

 public function __construct(){
 	//https://www.php.net/manual/es/function.spl-autoload-register.php
   //lo que hace este metodo magico es formal la ruta de carpeta/nombre de classe/ extencion entonces, entra a la carpeta y busca el archivo y lo incluye, esto es para no hacer el requere por cada archivo que nos movamos
	spl_autoload_register(function($class_name){
		$models_path ='./Models/' . $class_name .'.php';
		$controllers_path = './Controllers/'.$class_name.'.php';
		
		
		if(file_exists($models_path))require_once($models_path);
		if(file_exists($controllers_path))require_once($controllers_path);	
	});		
	}
	
}