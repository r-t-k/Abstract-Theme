<?php


namespace Abs;


abstract class element {
	public $data;

	function __construct(){

	}
	abstract function template();
	abstract function script();
	abstract function style();

	private function render(){
		$this->template();
		$this->script();
		$this->style();
	}

	public function instance(){
		$this->render();
	}

}

