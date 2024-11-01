<?php 
/**
 * surprise-post-grid
 *
 * @package     surprise-post-grid
 * @author      SolverWP
 * @copyright   2021 solverwp
 * @license     GPL-2.0-or-later
 *
 * Plugin Name: Surprise post grid
 * Plugin URI:  https://solverwp.com/
 * Description:  Surprise post grid for WordPress is the most advanced blog posts listing plugin that quickly allows you to display blog posts on your website with beautiful responsive design & with maximum flexibility.
 * Version:     1.0
 * Author:      SolverWP
 * Author URI:  https://profiles.wordpress.org/smarettheme/#content-plugins
 * Text Domain: surprise-post-grid
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */


if( !defined( 'ABSPATH' ) ) {
    die;
}


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define( 'SURPRISE_POST_GRID_ROOT_PATH',plugin_dir_path(__FILE__) );
define( 'SURPRISE_POST_GRID_ROOT_URL',plugin_dir_url(__FILE__) );
define( 'SURPRISE_POST_GRID_INC',SURPRISE_POST_GRID_ROOT_PATH .'/inc' );
define( 'SURPRISE_POST_GRID_CSS',SURPRISE_POST_GRID_ROOT_URL .'assets/css' );
define( 'SURPRISE_POST_GRID_JS',SURPRISE_POST_GRID_ROOT_URL .'assets/js' );


/** Plugin version **/
define('SURPRISE_POST_GRID_VERSION','1.0.0');


  
/**
 * Load plugin textdomain.
 */
add_action( 'plugins_loaded', 'surprise_post_gird_textdomain' );
if ( ! function_exists( 'surprise_post_gird_textdomain' ) ) {

	function surprise_post_gird_textdomain() {
	   load_plugin_textdomain( 'surprise-post-grid', false, plugin_basename( dirname( __FILE__ ) ) . '/language' ); 
	}

}


/*
 * require file
*/

if ( file_exists( SURPRISE_POST_GRID_INC.'/class-surprise-post-grid-init.php' ) ){
	 require_once SURPRISE_POST_GRID_INC.'/class-surprise-post-grid-init.php';
}





