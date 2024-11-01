<?php
/*
 * @package surprise post grid shortcode
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Surprise_Post_Grid_Shortcode') ){

	class Surprise_Post_Grid_Shortcode{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {

		//post grid
		add_shortcode( 'surprise_post_grid' ,array($this,'post_grid'));
		
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * post grid
		 * @since 1.0.0
		 * */
		public function post_grid($atts, $content = null){

			extract(shortcode_atts(array(
		        'posts_per_page' => 3,
		        'orderby' => 'date',
		        'order'=>'DESC',
		        'category'=>'',
		        'tag'=>'',
		        'column'=>3,
		        'style'=>'style-1',
		        'pagination'=>'no',

			),$atts));


    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $args  = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => $posts_per_page,
        'paged'=> $paged,
    );

    if( $column == 2 ){
        $col = 6;
    }elseif ( $column == 3 ) {
        $col = 4;
    }elseif ( $column == 4 ) {
        $col = 3;
    }elseif ( $column == 6 ) {
        $col = 2;
    }

    $args['orderby'] = $orderby;
    $args['order'] = $order;


       	if( !empty( $category ) ){
    		$args['tax_query'][] = array(
                'taxonomy'           => 'category',
                'field' => 'id',
                'terms' => $category
            );
        }

    	if( !empty( $tag ) ){
    		$args['tax_query'][] = array(
                'taxonomy'           => 'post_tag',
                'field' => 'id',
                'terms' => $tag
            );
    	}

    $posts_query = new \WP_Query( $args );

		?>
		<section class="eblog-area <?php echo esc_attr(  $style ); ?>">
            <div class="eblog-container">
                <div class="eblog-row">
                <?php 

                if ( $posts_query->have_posts() ):
                    while ( $posts_query->have_posts() ): $posts_query->the_post();
                ?>
                    <div class="eblog-col-lg-<?php echo esc_attr( $col ); ?>           eblog-col-sm-6">
                            <div class="eblog-single-inner <?php echo esc_attr(  $style ); ?>">

                            <div class="icon-img">
                               <?php the_post_thumbnail(); ?>
                            </div> 
                            <div class="content-box">
                                <ul class="eblog-meta-inner">
                                    <li><i class="fa fa-user"></i>
                                        <?php the_author(); ?>
                                    </li>
                                    <li><i class="fa fa-comment-alt"></i>
                                        <?php comments_popup_link(); ?>
                                    </li>
                                </ul>

                                <h2 class="inner-title">
	                                <a href="<?php the_permalink(); ?>">
	                                    <?php the_title(); ?>
	                                </a>
                                </h2>

                                <p><?php echo wp_trim_words( get_the_content(), 30 , '' ); ?></p>

                                <a class="readmore-btn" href="<?php the_permalink( ); ?>">
                                     <?php echo esc_html__( 'Read More', 'surprise-post-grid' ); ?>
                                 </a>
                                </div>
                            </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
            <div class="eblog-row eleblog-norma-pagi">
            <?php if( 'yes' == $pagination ) : ?>
                <div class="eblog-col-lg-12 text-center">
                    <?php

                    $add_args = [];

                    $big = 999999999; 
                    $pages = paginate_links( array( 
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format'       => '?paged=%#%',
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'total'        => $posts_query->max_num_pages,
                            'type'         => 'array',
                            'show_all'     => false,
                            'end_size'     => 3,
                            'mid_size'     => 1,
                            'prev_next'    => false,
                            'next_text'    => false,
                            'add_args'     => $add_args,
                            'add_fragment' => ''
                         )
                    );

                    if ( is_array( $pages ) ) {
                        $pagination = '<div class="eleblog-pagination"><ul class="pagination pagination-2">';

                        foreach ( $pages as $page ) {
                           $pagination .= '<li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
                        }

                        $pagination .= '</ul></div>';

                        echo wp_kses_post( $pagination );

                    }

                    wp_reset_postdata();
                    ?>

                </div>
                <?php endif; ?>
        </div>
        </section>  

		<?php

		}


	}//end class

		Surprise_Post_Grid_Shortcode::getInstance();
	

}//end if
