<?php
class MovieController{
	private $model;
	public function __construct(){
		$this->model= new movieModel();
	}
	public function set($ms_data=array()){
		return $this->model->set($ms_data);
	}
	public function get($ms=''){
		return $this->model->get($ms);
	}
	public function del($ms=''){
		return $this->model->del($ms);
	}
}