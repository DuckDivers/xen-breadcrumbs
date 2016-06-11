<?php
/*
  Plugin Name: Xenforo Style Breadcrumbs
  Plugin URI: https://www.duckdiverllc.com/
  Version: 1.3
  Author: Howard Ehrenberg
  Author URI: http://www.howardehrenberg.com
  Description: A plugin to have Xenforo Style breadcrumbs on your wordpress site.  Works well if you're matching a wordpress theme to a Xenforo theme.  Option to include or exclude current page.
  License: GNU General Public License v3
  License URI:       http://www.gnu.org/licenses/gpl-3.0.html
  Domain Path:       /languages
  Text Domain:       quacky-updater
  GitHub Plugin URI: https://github.com/DuckDivers/xen-breadcrumbs
  GitHub Branch:     master	
 */
if ( ! defined( 'ABSPATH' ) )
exit; 
// Define plugin file constant
define( 'DD_PLUGIN_FILE', __FILE__ );
define( 'DD_PLUGIN_VERSION', '1.3' );
$plugin_url = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__));

/**
 * Register style sheet.
 */
function register_xf_styles() {
	wp_register_style( 'xen-breadcrumbs', plugins_url( 'xen-breadcrumbs/assets/style.css', false, '1.0', 'all' ) );
	wp_enqueue_style( 'xen-breadcrumbs' );
	wp_register_style( 'xen-custom-css', plugins_url( 'xen-breadcrumbs/assets/custom-css.php', false, '1.0', 'all' ) );
	wp_enqueue_style( 'xen-custom-css' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_xf_styles' );

// Require Shortcodes and Widgets
require_once "$plugin_url/assets/breadcrumbs.php";
require_once "$plugin_url/assets/admin-options.php";
?>
