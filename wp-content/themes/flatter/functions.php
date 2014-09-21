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
