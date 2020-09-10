<?php
function blockLoader($mode = 'child'){
	return  \Abs\BlockLoader::new($mode);
}
// add async and defer attributes to enqueued scripts
function shapeSpace_script_loader_tag($tag, $handle, $src) {

	if ($handle === 'my-plugin-javascript-handle') {

		if (false === stripos($tag, 'async')) {

			$tag = str_replace(' src', ' async="async" src', $tag);

		}

		if (false === stripos($tag, 'defer')) {

			$tag = str_replace('<script ', '<script defer ', $tag);

		}

	}

	return $tag;

}
add_filter('script_loader_tag', 'shapeSpace_script_loader_tag', 10, 3);
