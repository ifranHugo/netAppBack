<?php

class ViewController {
	private static $view_path='./Views/';
	public function load_view($view){
  	require_once(self:: $view_path . 'header.php');
		require_once(self:: $view_path . $view .'.php');
    require_once(self:: $view_path . 'footer.php');
	}

}