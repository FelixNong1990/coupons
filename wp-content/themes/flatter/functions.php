<?php
/**
 * Child Theme functions file
 *
 * @package Flatter
 * @author Themebound
 */

require( dirname(__FILE__) . '/includes/theme-defaults.php' );
if( is_admin() ) 
	require( dirname(__FILE__) . '/includes/theme-admin.php' );
require( dirname(__FILE__) . '/includes/theme-actions.php' );
require( dirname(__FILE__) . '/includes/theme-functions.php' );
require( dirname(__FILE__) . '/includes/theme-mobile-widgets.php' );

//allow redirection, even if my theme starts to send output to the browser
add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

// if(!function_exists('custom_avatar')){
	// function custom_avatar($avatar_defaults){
		// $new_default_icon = 'http://localhost/gv/wp-content/images/mystery-man.png';
		// $avatar_defaults[$new_default_icon] = 'Custom Avatar';
		// return $avatar_defaults;
	// }
	// add_filter('avatar_defaults','custom_avatar');
// }


