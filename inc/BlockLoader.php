<?php

namespace Abs;
class BlockLoader {
	public $mode;
	private $dir;
	private $uri;
	public function __construct( $mode = 'child' ) {
		$this->mode = $mode;
		$this->mode_set();
	}
	private function mode_set() {
		if ( $this->mode === 'parent' ) {
			$this->dir = get_template_directory();
			$this->uri = get_template_directory_uri();
		}
		if ( $this->mode === 'child' ) {
			$this->dir = get_stylesheet_directory();
			$this->uri = get_stylesheet_directory_uri();
		}
	}
	public function get_block_template($block_name){
		return $this->dir . '/library/block_templates/'. $block_name . '_template.php';
	}
	public function block_css_uri($block_name){
		return $this->uri . '/library/block_assets/'. $block_name . '.css';
	}
	public function block_js_uri($block_name){
		return $this->uri . '/library/block_assets/'. $block_name . '.js';
	}
	public static function new($mode = 'child'){
		return new BlockLoader($mode);
	}
}
