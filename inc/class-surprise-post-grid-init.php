<?php
/**
 * @package Nextpage
 * @sicne 1.0.0
 * */

if ( ! class_exists( 'Surprise_Blog_Grid_Init' ) ) {

	class Surprise_Blog_Grid_Init {

		//instance
		protected static $instance;

		public function __construct() {
			//plugin_assets
			add_action( 'wp_enqueue_scripts', array( $this, 'plugin_assets' ), 99 );

			//load plugin dependency files
			$this->load_plugin_dependency_files();
		}



		/**
		 * plugin_assets()
		 * @since 1.0.0
		 * */
		public function plugin_assets() {
			$this->load_plugin_css();
			$this->load_plugin_js();
		}

		/*
		* default font
		*/
		public static function surprise_blog_grid_fonts_url() {
			$font_url = '';
			if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'surprise-post-grid' ) ) :
				$font_url = add_query_arg(
					array(
						'family' => urlencode( 'Inter:300,400,500,600,700&display=swa"' ),
					), "//fonts.googleapis.com/css" );
			endif;

			return apply_filters( 'surprise_blog_grid_font_url', esc_url( $font_url ) );
		}


		/**
		 * load plugin css
		 * @since 1.0.0
		 * */
		public function load_plugin_css() {

			wp_enqueue_style( 'surprise-blog-grid-font', self::surprise_blog_grid_fonts_url(), array(), SURPRISE_POST_GRID_VERSION, 'all');
			wp_enqueue_style( 'surprise-blog-grid', SURPRISE_POST_GRID_CSS.'/surprise-blog-grid.css',array(), SURPRISE_POST_GRID_VERSION, 'all');
		    wp_enqueue_style( 'surprise-blog-grid-global', SURPRISE_POST_GRID_CSS.'/surprise-blog-grid-global.css',array(), SURPRISE_POST_GRID_VERSION, 'all');
		    wp_enqueue_style( 'font-awesome', SURPRISE_POST_GRID_CSS.'/font-awesome.css',array(), SURPRISE_POST_GRID_VERSION, 'all');

		    wp_enqueue_style( 'surprise-blog-grid-main', SURPRISE_POST_GRID_CSS.'/surprise-blog-grid-styles.css',array(), SURPRISE_POST_GRID_VERSION, 'all');

		}

		/**
		 * load plugin js
		 * @since 1.0.0
		 * */
		public function load_plugin_js() {

			wp_enqueue_script( 'font-awesome', SURPRISE_POST_GRID_JS.'/font-awesome.js',array( 'jquery' ), SURPRISE_POST_GRID_VERSION, 'all');


		}


		/**
		 * load_plugin_dependency_files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files() {

			if ( ! class_exists( 'CSF' ) ) {
				require SURPRISE_POST_GRID_ROOT_PATH.'/lib/classes/setup.class.php';
			}

			$includes_files = array(
				array(
					'file-name' => 'class-surprise-post-grid-shortcode',
					'file-path' => SURPRISE_POST_GRID_INC
				),				
				array(
					'file-name' => 'options',
					'file-path' => SURPRISE_POST_GRID_INC
				),
			);
			if ( is_array( $includes_files ) && ! empty( $includes_files ) ) {
				foreach ( $includes_files as $file ) {
					if ( file_exists( $file['file-path'] . '/' . $file['file-name'] . '.php' ) ) {
						require $file['file-path'] . '/' . $file['file-name'] . '.php';
					}
				}
			}

		}

	}//end class

	new Surprise_Blog_Grid_Init();
}

