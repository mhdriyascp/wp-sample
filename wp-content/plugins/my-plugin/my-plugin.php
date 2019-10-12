<?php
/*
Plugin Name: Jobs
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: The Plugin's Version Number, e.g.: 1.0
Author: Mohammed Riyas
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
.
Any other notes about the plugin go here
.
*/

//Define plugin url
define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));

//Define plugin path
define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));

//enqueue scripts
function my_plugin_resources() {
   wp_enqueue_style('style', MY_PLUGIN_URL.'/assets/css/style.css');
   //wp_enqueue_script( 'customscripts', MY_PLUGIN_URL.'assets/css/myscripts.js','2.1', true );
}

add_action('wp_enqueue_scripts','my_plugin_resources');

/*Jobs and category start */
        add_action('init', 'create_job_post_type');
 
              function create_job_post_type() {
                    register_post_type('jobs', array(
                           'labels' => array(
                           'name' => __('Jobs'),
                           'singular_name' => __('jobs')
                            ),
                            'taxonomies' => array('jobs'),
                            'public' => true,
                            'has_archive' => true,
                            'supports' => array('title', 'thumbnail', 'editor'),
                            'query_var' => true,
                            'rewrite' => array('slug' => 'jobs'),
                            'menu_icon' => 'dashicons-book',     
                                )
                        );
                    }
                    add_action('init', 'build_job_taxonomies', 0);
 
                    function build_job_taxonomies() {
                        register_taxonomy(
                            'jobs', 'Jobs', // this is the custom post type(s) I want to use this taxonomy for
                                array(
                            'label' => 'Jobs Category',
                            'show_ui' => true,       
                            'hierarchical' => true,
                            'rewrite' => true,
                                )
						);	
                    }
 
/*Jobs and category end */

/*==========================Metabox Add===============================*/

//meta boxes add
function jobs_info_meta_box() {
       add_meta_box( 'Job Info', 'Jobs Additional Informations', 'jobs_info_callback', 'jobs', 'normal', 'default');
}
add_action('add_meta_boxes', 'jobs_info_meta_box');
//function callback
function jobs_info_callback($post) {
    wp_nonce_field( 'save_jobs_info_data', 'jobs_info_meta_box_nonce');

    $location = get_post_meta( $post->ID, '_jobs_info_location_key', true);
    $salary   = get_post_meta( $post->ID, '_jobs_info_salary_key', true );
    $jobType   = get_post_meta( $post->ID, '_jobs_info_jobtype_key', true );

    echo '<label for="jobs_location_field"> <strong> Location : </strong> </lable>';
    echo '<input type="text" id="jobs_location_field" name="jobs_location_field" value="' . esc_attr( $location ) . '" size="25"/>';
    
    echo"<br/>";
    echo '<label for="jobs_salary_field"><strong> Salary : </strong> </lable>'; 
    echo '<input type="text" id="jobs_salary_field" name="jobs_salary_field" value="' . esc_attr( $salary ) . '" size="25" />';

    echo"<br/>";
    echo '<label for="jobs_type_field"><strong> Job Type :</strong> </lable>'; 
    echo '<input type="text" id="jobs_type_field" name="jobs_type_field" value="' . esc_attr( $jobType ) . '" size="25" />';
}

//meta box save
   function save_jobs_info_data( $post_id ) {
       if(!isset($_POST['jobs_info_meta_box_nonce'])) {
           return;
       }
       if(!wp_verify_nonce( $_POST['jobs_info_meta_box_nonce'], 'save_jobs_info_data') ) {
           return;
       }
       if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
           return;
       }
       if(!current_user_can('edit_post', $post_id)) {
           return;
       }
       if(!isset($_POST['jobs_location_field']) && ! isset($_POST['jobs_salary_field'])  && ! isset($_POST['jobs_type_field'])) {
           return;
       }
       $location = sanitize_text_field($_POST['jobs_location_field']);
       $salary   = sanitize_text_field($_POST['jobs_salary_field']);
       $jobType  = sanitize_text_field($_POST['jobs_type_field']);

       update_post_meta( $post_id, '_jobs_info_location_key', $location);
       update_post_meta( $post_id, '_jobs_info_salary_key', $salary);
       update_post_meta( $post_id, '_jobs_info_jobtype_key', $jobType);
   }
   add_action('save_post', 'save_jobs_info_data');
/*==========================Metabox Add===============================*/

//shortcode for job listing
function jobs_loop_shortcode($atts, $content = null) {
    $atts = shortcode_atts( array(
        'id'=> '1',
        'layout' => 'list',
        'category' => ''
    ), $atts );

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = ['post_type' => 'jobs','post_status' => 'publish','posts_per_page' => 3,'paged' => $paged];
    $my_query = null;
    $my_query = new WP_query($args);

    if($my_query->have_posts()):
        while($my_query->have_posts()) : $my_query->the_post();
            ob_start();
            include( MY_PLUGIN_PATH . '/includes/views/all-jobs.php');
        endwhile;
        wp_reset_postdata();?>
        <div class="pagination">
        <?php
        echo paginate_links( array(
            'format'  => 'page/%#%',
            'current' => $paged,
            'total'   => $the_query->max_num_pages,
            'mid_size'        => 2,
            'prev_text'       => __('&laquo; Prev Page'),
            'next_text'       => __('Next Page &raquo;')
        ) );
        ?>
    </div>
       <?php return ob_get_clean();
    else :
    _e( 'Sorry, no posts matched your criteria.' );
    endif;   
}
add_shortcode( 'all-jobs', 'jobs_loop_shortcode' );
 
// Wp ajax calls
// add_action( 'wp_ajax_call', 'do_my_ajax_call' );
// add_action( 'wp_ajax_nopriv_my_ajaxcall', 'do_my_ajax_call' );// for Non authenticated Users

// function do_my_ajax_call() {

// }


