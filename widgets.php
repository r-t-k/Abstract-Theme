<?php
/*if ( ! defined( 'ABSPATH' ) ) exit;

$widgets = array(
    'example' => array(
        'path' => '/',
        'name' => 'example'
    )
);

foreach ( $widgets as $widget ):

    $widget_file = get_stylesheet_directory() . $widget['path'] . '/widgets/' . $widget['name'] . '/' . $widget['name'] . '.php';

    if ( file_exists( $widget_file ) ):

        include_once  $widget_file;

    else:

        esc_html_e( "Unable to find widget file for: $widget", 'kyser' );

    endif;

endforeach;

add_action('in_widget_form', 'awts_get_widget_id');

function awts_get_widget_id($widget_instance)

{

// display widget id in wp admin

    if ($widget_instance->number=="__i__"){

        echo "<p><strong>Widget ID is</strong>: Please save the widget first!</p>" ;


    } else {
        echo "<p><strong>Widget ID is: </strong>" .$widget_instance->id. "</p>";


    }
}*/

