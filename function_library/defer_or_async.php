<?php
if ( ! is_admin() ) {
	function add_asyncdefer_attribute( $tag, $handle ) {
		// if the unique handle/name of the registered script has 'async' in it
		if ( strpos( $handle, 'async' ) !== false ) {
			// return the tag with the async attribute
			return str_replace( '<script ', '<script async ', $tag );
		} // if the unique handle/name of the registered script has 'defer' in it
		else if ( strpos( $handle, 'defer' ) !== false ) {
			// return the tag with the defer attribute
			return str_replace( '<script ', '<script defer ', $tag );
		} // otherwise skip
		else {
			return $tag;
		}
	}

	add_filter( 'script_loader_tag', 'add_asyncdefer_attribute', 10, 2 );
}


function add_rel_preload( $html, $handle, $href, $media ) {
	if ( is_admin() ) {
		return $html;
	}
	if ( strpos( $handle, 'preload' ) !== false ) {
		// return the tag with the async attribute
		$html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" 
id='$handle' href='$href' type='text/css' media='all' />
EOT;


	}
	return $html;
}

add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );
