<?php
   /**
    * Mytheme  functions and defenitions
    * 
    */

   /**
    * ===================================================
    *  Enqueues scripts and styles.
    * ===================================================
    */

    function mytheme_scripts_enqueue(){
        
        // theme stylesheet.
		wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/style.css', array(), '3.4.1' );
		
		//bootstrap stylesheet
		wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1' );

		//font-awsome icons
		
		wp_enqueue_style( 'fontawsome-css', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
        //theme custom scripts
        wp_enqueue_script( 'customscripts', get_template_directory_uri() . '/js/custom.js', array(), '2.1', true );
    }

    add_action( 'wp_enqueue_scripts', 'mytheme_scripts_enqueue' );


   /**
    * ===================================================
    *  This theme Setup
    * ===================================================
    */
    if ( ! function_exists( 'mytheme_setup' ) ) :

        function mytheme_setup() {

            // add_theme_support('menus');

            // register_nav_menu('Primary','Primary Header Navigation');

       /** 
        * Enable support for Post Thumbnails on posts and pages.
        *
        */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 9999 );
        
        
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'header' => __( 'Header Menu', 'Mytheme' ),
                'footer'  => __( 'Footer Menu', 'Mytheme' ),
            )
        );

        /**
         * Enable support for Post Formats.
         *
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'status',
                'audio',
                'chat',
            )
        ); 
        // load header
        add_theme_support( 'custom-header' );

        // Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );
        
        // Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'twentysixteen' ),
					'slug'  => 'dark-gray',
					'color' => '#1a1a1a',
				),
				array(
					'name'  => __( 'Medium Gray', 'twentysixteen' ),
					'slug'  => 'medium-gray',
					'color' => '#686868',
				),
				array(
					'name'  => __( 'Light Gray', 'twentysixteen' ),
					'slug'  => 'light-gray',
					'color' => '#e5e5e5',
				),
				array(
					'name'  => __( 'White', 'twentysixteen' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Blue Gray', 'twentysixteen' ),
					'slug'  => 'blue-gray',
					'color' => '#4d545c',
				),
				array(
					'name'  => __( 'Bright Blue', 'twentysixteen' ),
					'slug'  => 'bright-blue',
					'color' => '#007acc',
				),
				array(
					'name'  => __( 'Light Blue', 'twentysixteen' ),
					'slug'  => 'light-blue',
					'color' => '#9adffd',
				),
				array(
					'name'  => __( 'Dark Brown', 'twentysixteen' ),
					'slug'  => 'dark-brown',
					'color' => '#402b30',
				),
				array(
					'name'  => __( 'Medium Brown', 'twentysixteen' ),
					'slug'  => 'medium-brown',
					'color' => '#774e24',
				),
				array(
					'name'  => __( 'Dark Red', 'twentysixteen' ),
					'slug'  => 'dark-red',
					'color' => '#640c1f',
				),
				array(
					'name'  => __( 'Bright Red', 'twentysixteen' ),
					'slug'  => 'bright-red',
					'color' => '#ff675f',
				),
				array(
					'name'  => __( 'Yellow', 'twentysixteen' ),
					'slug'  => 'yellow',
					'color' => '#ffef8e',
				),
			)
		);
        // Indicate widget sidebars can use selective refresh in the Customizer.
		//add_theme_support( 'customize-selective-refresh-widgets' );
    }
    endif; // Mytheme Setup

    add_action( 'after_setup_theme', 'mytheme_setup' );


   /**
    * Registers a widget area.
    *
    */
function mytheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'mytheme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'mytheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'mytheme' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mytheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'mytheme' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mytheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mytheme_widgets_init' );  

/**================================= Custom Post Types  ============================================**/
    
    // Jobs and category start 
    // function create_jobs_post_type()
    // {
    //     register_post_type('jobs', array(
    //             'labels' => array(
    //             'name' => __('All Jobs'),
    //             'singular_name' => __('jobs')
    //             ),
    //             'taxonomies' => array('jobs'),
    //             'public' => true,
    //             'has_archive' => true,
    //             'supports' => array('title', 'thumbnail', 'editor'),
    //             'query_var' => true,
    //             'rewrite' => array('slug' => 'jobs'),
    //             'menu_icon' => 'dashicons-list-view',     
    //                 )
    //         );
    //     }
    //     add_action('init', 'create_jobs_post_type');

    //     // for creating job category
    //     function build_jobs_taxonomies() {
    //         register_taxonomy(
    //             'jobs', 'Jobs', // this is the custom post type(s) I want to use this taxonomy for
    //                 array(
    //             'label' => 'Jobs Category',
    //             'show_ui' => true,       
    //             'hierarchical' => true,
    //             'rewrite' => true,
    //                 )
    //         );	
    //     }

    // add_action('init', 'build_jobs_taxonomies', 0);
/*Jobs and category end */

/**================================= Custom Post Types  ============================================**/