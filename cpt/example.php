<?php
/*// create a field group
$test = new \Kyser\super_group( 'example', 'ExampleGroup', 'post_type', 'example', '0' );
// add fields to the field array
$test->add_field( 'test-a', 'test-a', 'testa', 'text' );
$test->add_field( 'test-b', 'test-b', 'testb', 'text' );
// register the field
$test->register();
// add fields after it has been registered
$test->create_field( 'test-c', 'test-c', 'testc', 'text' );


//define the optional admin cols first if applicable
$admin_cols = array(
	'SACF' => array(
		'title'          => 'DATA',
		'function' => function() {
			echo 'whatever';
		},
	),
);
//( $name, $base_names = array(''), $show_ui = false, $icon = '', $admin_cols = array(), $admin_filters = array() )
// params: name of CPT, optional base names array (slug,singular,plural), show in admin, admin cols array, admin filters array.
//public function __construct( $name, $base_names = array(), $show_ui = false, $icon = '', $admin_cols = array(), $admin_filters = array() )
$CPT = new \Kyser\CPT('Example', false, true, 'dashicons-layout' , $admin_cols);
$CPT->add_instance('example instance');
$example_instance = $CPT->get_instance('example instance'); // returns post id
$example_instance_data = $CPT->get_instance_data('example instance'); // get the acf fields for this instance (array)
$example_instance_post = $CPT->get_instance_data('example instance', true); //return the wp post object for this instance

// change instance data
update_field('test-a', 'FOOBILL', $example_instance);



*/
