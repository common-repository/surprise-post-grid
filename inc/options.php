<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

if ( class_exists( 'CSF' ) ) {
//
// Set a unique slug-like ID
//
$prefix = '_surprise';

//
// Create options
//
CSF::createOptions( $prefix, array(
  'menu_title' => 'Surprise options',
    'menu_slug'  => 'surprise-grid-options',
    'menu_type' => 'menu',
    'enqueue_webfont'         => true,
    'menu_icon'         => 'dashicons-grid-view',
    'show_footer' => false,
    'theme'=>'light',
    'framework_title' =>  'SURPRISE GRID OPTIONS',
    'footer_credit' =>  'Thank you for using surprise post grid. If you have any question please contact us at https://solverwp.com/',

) );

 CSF::createSection( $prefix, array(
    'title'  => 'Title Options',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
      array(
        'id' =>'title_color',
        'title' => esc_html__('Title Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#222",
        'output' => '.eblog-single-inner .inner-title a',

      ),      
      array(
        'id' =>'title_hover_color',
        'title' => esc_html__('Title Hover Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#1368ab",
        'output' => '.eblog-single-inner .inner-title a:hover',
      ),
      array(
			  'id'      => 'title_typography',
			  'type'    => 'typography',
			  'title'   => 'Typography',
			   'output'  => '.eblog-single-inner .inner-title a',
			   'color'          => false,
				'subset'         => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'text_align' => false,
			  'default' => array(
			    'font-family' => 'Inter',
			    'font-size'   => '24',
			    'line-height' => '29',
			    'unit'        => 'px',
			    'type'        => 'google',
			  ),
			),
    )));


 CSF::createSection( $prefix, array(
    'title'  => 'Content Options',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
      array(
        'id' =>'content_color',
        'title' => esc_html__('Content Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#333333",
        'output' => '.eblog-area .content-box p',

      ),      
      array(
			  'id'      => 'content_typography',
			  'type'    => 'typography',
			  'title'   => 'Typography',
			   'output'  => '.eblog-area .content-box p',
			   'color'          => false,
				'subset'         => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'text_align' => false,
			  'default' => array(
			    'font-family' => 'Inter',
			    'font-size'   => '15',
			    'line-height' => '26',
			    'unit'        => 'px',
			    'type'        => 'google',
			  ),
			),
    )));


 CSF::createSection( $prefix, array(
    'title'  => 'Meta Options',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
      array(
        'id' =>'meta_icon_color',
        'title' => esc_html__('Icon Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#1368ab",
        'output' => array( '.eblog-meta-inner li i', '.eblog-meta-inner li img', '.eblog-meta-inner li svg' ),

      ),
       array(
		  'id'      => 'icon_font_size',
		  'type'    => 'typography',
		  'title'   => 'Icon Font Size',
		   'output'  => '.eblog-meta-inner li i',
		   'color'          => false,
			'subset'         => false,
			'text_transform' => false,
			'letter_spacing' => false,
			'text_align' => false,
			'font_family' => false,
			'line_height' => false,
		  'default' => array(
		    'font-size'   => '12',
		    'unit'        => 'px',
		    'type'        => 'google',
		  ),
		),      
      array(
        'id' =>'meta_text_color',
        'title' => esc_html__('Meta Text Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#333333",
        'output'  => array( '.eblog-meta-inner li', '.eblog-meta-inner li a' ),

      ),      
      array(
			  'id'      => 'meta_typography',
			  'type'    => 'typography',
			  'title'   => 'Typography',
			   'output'  => array( '.eblog-meta-inner li', '.eblog-meta-inner li a' ),
			   'color'          => false,
				'subset'         => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'text_align' => false,
			  'default' => array(
			    'font-family' => 'Inter',
			    'font-size'   => '12',
			    'line-height' => '22',
			    'unit'        => 'px',
			    'type'        => 'google',
			  ),
			),
    )));


 CSF::createSection( $prefix, array(
    'title'  => 'Read More',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
      array(
        'id' =>'read_more_color',
        'title' => esc_html__('Read More Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#484848",
        'output' => '.eblog-single-inner .readmore-btn',
      ),      
      array(
        'id' =>'read_more_hover_color',
        'title' => esc_html__('Read More Hover Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#fff",
        'output' => '.eblog-single-inner .readmore-btn:hover',
      ),      
      array(
        'id' =>'read_more_btn_hover_color',
        'title' => esc_html__('Read More Button Hover Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#1368ab",
        'output' => '.eblog-single-inner .readmore-btn:hover',
        'output_mode' => 'background-color'
      ),

    ))); 


 	CSF::createSection( $prefix, array(
    'title'  => 'Pagination',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
      array(
        'id' =>'btn_bg_color',
        'title' => esc_html__('Button Background Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#337ab7",
        'output' => '.pagination > .active > span',
        'output_mode' => 'background-color'
      ),          
      array(
        'id' =>'btn_bg_border_color',
        'title' => esc_html__('Button Border Color','surprise-post-grid'),
        'type' => 'color',
        'default'=>"#337ab7",
        'output' => '.pagination > .active > span',
        'output_mode' => 'border-color'
      ),          

    )));

    CSF::createSection( $prefix, array(
    'title'  => 'Shortcode',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
		array(
		  'type'    => 'content',
		  'content' => 'This is example shortcode <pre>[surprise_post_grid style="style-1" posts_per_page="3" orderby="date" order="desc" column="3" pagination="yes"]</pre>
		  <p>You can generate shortcode. To generate shortcode go to <b> page and search in gutenberg "Surprise Shortcode" then insert it<b>. After insert it you\'ll find a button named "Generate Shortcode". CLick it and generate your necessary shortcode</p>',
		),
		// A Notice
		array(
		  'type'    => 'notice',
		  'style'   => 'success',
		  'content' => 'You can generate shortcode by click the "Generate Shortcode" Button, then copy the shortcode and paste it which page you need.',
		),

		array(
		  'id'    => 'opt-wp-editor-1',
		  'type'  => 'wp_editor',
		  'title' => 'WP Editor',
		),


		        

    )));



 //
// shortcode button
//
 $prefix_shortcodde = 'surprise_shortcode';
CSF::createShortcoder( $prefix_shortcodde, array(
  'button_title'   => 'Generate Shortcode',
  'select_title'   => 'Generate Shortcode',
  'insert_title'   => 'Insert Shortcode',
  'show_in_editor' => true,
  'gutenberg'      => array(
    'title'        => 'Surprise Shortcode',
    'description'  => 'Surprise Shortcode Block',
    'icon'         => 'screenoptions',
    'category'     => 'widgets',
    'keywords'     => array( 'Surprise Shortcode' ),
    'placeholder'  => 'Write shortcode here...',
  )
) );

CSF::createSection( $prefix_shortcodde, array(
  'title'  => 'Shortcode For Default Post',
  'view'   => 'normal',
  'shortcode' => 'surprise_post_grid',
  'fields' => array(
  	 array(
      'id'      => 'style',
      'type'    => 'select',
      'title'   => 'Select Style ',
      'options' => array(
        'style-1' => 'First Style',
        'style-2' => 'Second Style',
        'style-3' => 'Third Style',
        'style-4' => 'Fourth Style',
        'style-5' => 'Fifth Style',
        'style-6' => 'Sixth Style',
      ),
    ),
    array(
      'id'    => 'posts_per_page',
      'type'  => 'text',
      'title' => 'Posts Per Page',
      'default' => '3',
    ),

    array(
      'id'      => 'orderby',
      'type'    => 'select',
      'title'   => 'Select Order By',
      'options' => array(
        'author' => 'Author',
        'title' => 'Title',
        'name' => 'Name',
        'date' => 'Date',
        'rand' => 'Random',
      ),
       'default'=>'date'
    ),
    array(
      'id'      => 'order',
      'type'    => 'select',
      'title'   => 'Select Order ',
      'options' => array(
        'desc' => 'DESC',
        'asc' => 'ASC',
      ),
    ),    
    array(
      'id'      => 'category',
      'type'    => 'select',
      'placeholder' => 'Select a category',
      'title'   => 'Select Category',
      'options' => 'categories'
    ),    
    array(
      'id'      => 'tag',
      'type'    => 'select',
      'placeholder' => 'Select a tag',
      'title'   => 'Select Tag',
      'options' => 'tags'
    ),
     array(
      'id'      => 'column',
      'type'    => 'select',
      'title'   => 'Post Layout',
      'options' => array(
        '2' => '2 Column',
        '3' => '3 Column',
        '4' => '4 Column',
        '6' => '6 Column',
      ),
      'default'=>3
    ),
    array(
      'id'      => 'pagination',
      'type'    => 'select',
      'title'   => 'Show Pagination',
      'options' => array(
        'yes' => 'Yes',
        'no' => 'No',
      ),
    ), 
   
  )
) );

}
