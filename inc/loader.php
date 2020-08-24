<?php

namespace Kyser;


class loader {
	public $mode;
	private $dir;
	private $uri;

	public function __construct( $mode = 'parent' ) {
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

	public function autoload() {
		if ( $this->mode === 'parent' ) {
			$this->load_tasks();
			$this->load_classes();
			$this->load_api();
			$this->load_settings(); //wp_intervention
			$this->load_acf_builder(); //stout acf builder
			$this->load_elements(); //UI elements
			$this->load_components();
			$this->load_tasks();
			$this->load_blocks();
			$this->remote_assets();
			$this->enqueue_theme_assets();
		}
		if ( $this->mode === 'child' ) {
			$this->load_tasks();
			$this->load_classes();
			$this->load_api();
			$this->load_controllers();
			$this->load_settings();
			$this->load_elements();
			$this->load_components();
			$this->load_blocks();
			$this->remote_assets();
			$this->enqueue_child_assets();
		}

	}


	private function load_settings() // Settings :: Hook = setup_theme
	{
		if ( function_exists( '\Sober\Intervention\intervention' ) ) {
			add_action(
				'setup_theme', function () {
				foreach ( glob( $this->dir . "/settings/*.php" ) as $setting ) {
					require $setting;
				}
			}
			);
		}
	}

	private function load_classes() // Classes :: Hook = init
	{
		add_action(
			'init', function () {
			//require_once get_template_directory() . '/vendor/autoload.php';
			foreach ( glob( $this->dir . "/classes/*.php" ) as $class ) {
				require $class;
			}

		}
		);
	}

	private function load_controllers() // Classes :: Hook = wp_loaded
	{
		add_action(
			'wp_loaded', function () {
			//require_once get_template_directory() . '/vendor/autoload.php';
			foreach ( glob( $this->dir . "/controllers/*.php" ) as $class ) {
				require $class;
			}
		}
		);
	}

	private function load_api() // Classes :: Hook = init
	{
		add_action(
			'init', function () {
			//require_once get_template_directory() . '/vendor/autoload.php';
			foreach ( glob( $this->dir . "/api/*.php" ) as $class ) {
				require $class;
			}

		}
		);
	}

	/*private function load_cpt() // Classes :: Hook = init
	{
		add_action(
			'init', function () {
			require_once get_template_directory() . '/lib/extended-cpts-develop/extended-cpts.php';
			foreach ( glob( $this->dir . "/cpt/*.php" ) as $cpt ) {
				require $cpt;
			}
		}
		);
	}*/

	// PHP Functions autoload php files in the tasks directory || this is to clean up and organize theme functions by allowing them to easily be different files
	private function load_tasks() // Tasks :: Hook = none
	{
		foreach ( glob( $this->dir . "/tasks/*.php" ) as $task ) {
			require $task;
		}

	}

	/*private function load_shortcodes() // Shortcodes :: Hook = wp_head
	{
		add_action(
			'wp_head', function () {
			foreach ( glob( get_stylesheet_directory() . "/shortcodes/*.php" ) as $shortcode ) {
				require $shortcode;
			}
		}
		);
	}*/
	private function load_acf_builder() // Option Pages :: Hook = init
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'init', function () {
				require_once $this->dir . '/lib/acf-builder/autoload.php';
			}
			);
		}
	}

	/*private function load_options() // Option Pages :: Hook = init
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'init', function () {
				foreach ( glob( $this->dir . "/options/*.php" ) as $option ) {
					require $option;
				}
			}
			);
		}
	}*/

	private function load_blocks() // Option Pages :: Hook = init
	{
		if ( function_exists( 'acf_register_block_type' ) ) {
			add_action(
				'acf/init', function () {
				foreach ( glob( $this->dir . "/blocks/*.php" ) as $option ) {
					require $option;
				}
			}
			);
		}
	}

	/*private function load_post_models() // Option Pages :: Hook = init
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_loaded', function () {
				foreach ( glob( $this->dir . "/post_models/*.php" ) as $option ) {
					require $option;
				}
			}
			);
		}
	}*/

	//af_register_form
	/*private function load_forms() // Option Pages :: Hook = init
	{
		if ( function_exists( 'af_register_form' ) ) {
			add_action(
				'af/register_forms', function () {
				foreach ( glob( $this->dir . "/forms/*.php" ) as $option ) {
					require $option;
				}
			}
			);
		}

	}*/

	private function load_elements() // Option Pages :: Hook = wp_loaded
	{
		add_action(
			'wp_loaded', function () {
			foreach ( glob( $this->dir . "/elements/*.php" ) as $el ) {
				require $el;
			}
		}
		);

	}

	private function load_components() // Option Pages :: Hook = wp_loaded
	{
		add_action(
			'wp_loaded', function () {
			foreach ( glob( $this->dir . "/components/*.php" ) as $component ) {
				require $component;
			}
		}
		);
	}


	/*	private function load_extras() {
			add_action(
				'wp_head', function () {
				require_once $this->dir . '/sidebars.php'; // Sidebars
				require_once $this->dir . '/widgets.php'; // Widgets
			}
			);
		}*/

	private function remote_assets() {
		include_once $this->dir . '/remote_assets.php';
	}

	// Javascript and CSS file autoloader (replace stylesheet_directory with template_directory if this not a child theme) :: Hook = wp_loaded

	public $conditionalCSS = array();
	public $conditionalJS = array();

	private function enqueue_theme_assets() {
		add_action(
			'wp_enqueue_scripts', function () {
			$dirJS  = new \DirectoryIterator( get_template_directory() . '/js' );
			$dirCSS = new \DirectoryIterator( get_template_directory() . '/css' );

			foreach ( $dirJS as $file ) {

				if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'js' && ! in_array( basename( $file ), array_keys( $this->conditionalJS ) ) ) {
					$name         = basename( $file, '.js' );
					$name_and_ext = basename( $file );
					wp_enqueue_script( $name, get_template_directory_uri() . '/js/' . $name_and_ext );

				}
			}
			array_walk(
				$this->conditionalJS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_script( $key, get_template_directory_uri() . '/js/' . $key );
				}
			}
			);

			foreach ( $dirCSS as $style ) {

				if ( pathinfo( $style, PATHINFO_EXTENSION ) === 'css' && ! in_array( basename( $style ), array_keys( $this->conditionalCSS ) ) ) {
					$s_name         = basename( $style, '.css' );
					$s_name_and_ext = basename( $style );


					wp_enqueue_style( $s_name, get_template_directory_uri() . '/css/' . $s_name_and_ext );

				}

			}

			array_walk(
				$this->conditionalCSS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_style( $key, get_template_directory_uri() . '/css/' . $key );
				}
			}
			);
		}
		);
	}

	private function enqueue_child_assets() {
		add_action(
			'wp_enqueue_scripts', function () {
			$dirJS  = new \DirectoryIterator( get_stylesheet_directory() . '/js' );
			$dirCSS = new \DirectoryIterator( get_stylesheet_directory() . '/css' );

			foreach ( $dirJS as $file ) {

				if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'js' && ! in_array( basename( $file ), array_keys( $this->conditionalJS ) ) ) {
					$name         = basename( $file, '.js' );
					$name_and_ext = basename( $file );
					wp_enqueue_script( $name, get_stylesheet_directory_uri() . '/js/' . $name_and_ext );

				}
			}
			array_walk(
				$this->conditionalJS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_script( $key, get_stylesheet_directory_uri() . '/js/' . $key );
				}
			}
			);

			foreach ( $dirCSS as $style ) {

				if ( pathinfo( $style, PATHINFO_EXTENSION ) === 'css' && ! in_array( basename( $style ), array_keys( $this->conditionalCSS ) ) ) {
					$s_name         = basename( $style, '.css' );
					$s_name_and_ext = basename( $style );


					wp_enqueue_style( $s_name, get_stylesheet_directory_uri() . '/css/' . $s_name_and_ext );

				}

			}

			array_walk(
				$this->conditionalCSS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_style( $key, get_stylesheet_directory_uri() . '/css/' . $key );
				}
			}
			);
		}
		);
	}

}
