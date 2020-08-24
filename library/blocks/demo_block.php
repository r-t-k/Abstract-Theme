<?php

acf_register_block_type(
	array(
		'name'            => 'demo_block',
		'title'           => __( 'Abstract Demo Block' ),
		'description'     => __( 'A custom block' ),
		'render_template' => blockLoader('parent')->get_block_template( 'demo_block' ),
		'category'        => 'formatting',
		'enqueue_script'  => blockLoader('parent')->block_js_uri( 'demo_block' ),
		'enqueue_style'   => blockLoader('parent')->block_css_uri( 'demo_block' )
	)
);
