<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'rnxr6w508pu2gkfm21fltpa1r4l53vpm0' );

// WooFramework
require_once ($functions_path . 'admin-init.php' );			// Framework Init

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
	'includes/theme-options.php', 			// Options panel settings and custom settings
	'includes/theme-functions.php', 		// Custom theme functions
	'includes/theme-actions.php', 			// Theme actions & user defined hooks
	'includes/theme-comments.php', 			// Custom comments/pingback loop
	'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
	'includes/sidebar-init.php', 			// Initialize widgetized areas
	'includes/theme-widgets.php'			// Theme widgets
);

// Add custom DLVS includes
array_splice($includes, count($includes), 0, array(
	'includes/dlvs/DynamicMenus.php',
	'includes/dlvs/menu-general.php',
	'includes/dlvs/post-type-clinic.php',
	'includes/dlvs/post-type-country.php',
	'includes/dlvs/post-type-faq.php',
	'includes/dlvs/post-type-region.php',
	'includes/dlvs/post-type-vaccination.php',
	'includes/dlvs/relationships.php',
	'includes/dlvs/rewrite.php',
	'includes/dlvs/setup.php',
	'includes/dlvs/utilities.php',
	'includes/dlvs/translations.php',
	'includes/dlvs/vaccination_groups.php'
));


// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

// add widget area
add_action( 'after_setup_theme', 'child_theme_setup' );

if ( !function_exists( 'child_theme_setup' ) ):
function child_theme_setup() {

	register_sidebar( array(
		'name' => __( 'Country vaccination information', 'whitelight' ),
		'id' => 'vaccination-information',
		'description' => __( 'Will be shown on the country page for AdWords referrals', 'whitelight' ),
	) );

	register_sidebar( array(
		'name' => __( 'Country vaccination disclaimer', 'whitelight' ),
		'id' => 'vaccination-disclaimer',
		'description' => __( 'Standard disclaimer shown at the bottom of the country page', 'whitelight' ),
	) );

	register_sidebar( array(
		'name' => __( 'Header', 'whitelight' ),
		'id' => 'header',
		'description' => __( 'Top right area in header for info card', 'whitelight' ),
	) );

}
endif;



/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>