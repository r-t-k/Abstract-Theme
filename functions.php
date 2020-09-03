<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('xdebug.var_display_max_data', '-1');*/

/* ================================================================================================ */
/*require_once get_template_directory() . '/lib/wp-package-updater/class-wp-package-updater.php';

$abstract_theme = new WP_Package_Updater(
	'https://wp.kyser.dev',
	wp_normalize_path( __FILE__ ),
	get_stylesheet_directory()
);*/
/* ================================================================================================ */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'abstract_register_required_plugins' );


function abstract_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		/*array(
			'name'               => 'Gravity Forms', // The plugin name.
			'slug'               => 'gravityforms', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/gravityforms_2.2.5.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Gravity View', // The plugin name.
			'slug'               => 'gravityview', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/GravityView-v1.22.5.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),*/
		array(
			'name'   => 'Advanced Custom Fields PRO',
			'slug'   => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source' => 'https://github.com/wp-premium/advanced-custom-fields-pro/archive/master.zip',
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),
		array(
			'name'               => 'Models', // The plugin name.
			'slug'               => 'models', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/models.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Advanced Forms Pro', // The plugin name.
			'slug'               => 'advanced-forms-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/advanced-forms-pro.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => false,
			'force_activation' => true,
		),
		array(
			'name'      => 'ACF to REST API',
			'slug'      => 'acf-to-rest-api',
			'required'  => false,
			'force_activation' => true,
		),
		array(
			'name'      => 'Advanced Custom Fields: Extended',
			'slug'      => 'acf-extended',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Github Updater',
			'slug'      => 'github-updater',
			'source'    => 'https://github.com/afragen/github-updater/archive/master.zip',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Intervention',
			'slug'      => 'intervention',
			'source'    => 'https://github.com/soberwp/intervention/archive/master.zip',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Gitium',
			'slug'      => 'gitium',
			'required'  => false,
		),
		array(
			'name'      => 'Query Monitor',
			'slug'      => 'query-monitor',
			'required'  => false,
		),
		/*array(
			'name'      => 'ACF to REST API',
			'slug'      => 'acf-to-rest-api',
			'source'    => 'https://github.com/airesvsg/acf-to-rest-api/archive/master.zip',
		),*/

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'NinjaFirewall (WP Edition) – Advanced Security',
			'slug'      => 'ninjafirewall',
			'required'  => false,
		),
		array(
			'name'      => 'Slimstat Analytics',
			'slug'      => 'wp-slimstat',
			'required'  => false,
		),
		array(
			'name'      => 'Easy WP SMTP',
			'slug'      => 'easy-wp-smtp',
			'required'  => false,
		),
		array(
			'name'      => 'Duplicate Page',
			'slug'      => 'duplicate-page',
			'required'  => false,
		),
		array(
			'name'      => 'The SEO Framework',
			'slug'      => 'autodescription',
			'required'  => false,
		),
		array(
			'name'      => 'Instant Images – One Click Unsplash Uploads',
			'slug'      => 'instant-images',
			'required'  => false,
		),
		/*array(
			'name'      => 'LearnPress – WordPress LMS Plugin',
			'slug'      => 'learnpress',
			'required'  => false,
		),*/


	);
	$config = array(
		'id'           => 'abstract',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'abstract' ),
			'menu_title'                      => __( 'Install Plugins', 'abstract' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'abstract' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'abstract' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'abstract' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'abstract'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'abstract'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'abstract'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'abstract'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'abstract'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'abstract'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'abstract'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'abstract'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'abstract'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'abstract' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'abstract' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'abstract' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'abstract' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'abstract' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'abstract' ),
			'dismiss'                         => __( 'Dismiss this notice', 'abstract' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'abstract' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'abstract' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

/* ================================================================================================ */
//vendor

/* ================================================================================================ */
//loader
require_once get_template_directory() . '/inc/loader.php';
require_once get_template_directory() . '/inc/BlockLoader.php';
require_once get_template_directory() . '/inc/helpers.php';
$parentLoader = new \Kyser\loader('parent');
//conditional resources here:
$parentLoader->conditionalJS  = array();
$parentLoader->conditionalCSS = array();

$parentLoader->autoload();


/* ================================================================================================ */

