<?php
/**
 * front-page
 *
 */
get_header(); ?>
<div class="front-page">
    <div class="banner" style="background:url('<?=get_template_directory_uri()?>/images/bn2.jpg')"></div>
    <div class="container">
        <h1 class="job-title">Latest Jobs</h1>
        <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = ['post_type'=>'jobs', 'posts_per_page' => 3];
            $data = new WP_Query($args);
            
            if($data->have_posts()) :
                while($data->have_posts())  : $data->the_post();?>
                     
                     <?=the_title();?>
                
                <?php endwhile;wp_reset_postdata();
            
                $total_pages = $data->max_num_pages;

                if ( $total_pages > 1 ) {
                    $current_page = max(1, get_query_var('paged'));
            
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '/page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('« prev'),
                        'next_text'    => __('next »'),
                    ));
                } else {
                   // echo'404 Error&#58; Not Found';
                }   
            endif; 
              
        ?>

        <div class="job-list">
            <?php 
            // Protect against arbitrary paged values
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $args = ['post_type' => 'jobs','post_status' => 'publish','posts_per_page' => 3,'paged' => $paged];
            $loop = new WP_Query($args);
            
            if ( $loop->have_posts() ) :
            
            while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <div class="job-item col-md-12">
                <div class="row">
                    <div class="item-img col-md-3">
                        <img src="<?=get_the_post_thumbnail_url();?>" class="img-thumbnail"  alt="">
                    </div>
                    <div class="item-content col-md-8">
                        <h2><?=get_the_title();?></h2>
                        <strong><span class="amenities"><i class="fa fa-map-marker" aria-hidden="true"></i> : <?=get_post_meta( $post->ID, '_jobs_info_location_key', true);?></span></strong>,
                        <strong><span class="amenities">Salarry  : <i class="fa fa-inr" aria-hidden="true"></i>  <?=get_post_meta( $post->ID, '_jobs_info_salary_key', true );?></strong> </span></strong>,
                        <strong><span class="amenities">Job-Type : <?=get_post_meta( $post->ID, '_jobs_info_jobtype_key', true );?></span></strong>
                        <p><?=wp_trim_words(get_the_content(), 40, '...' );?></p>
                        <button><a href="<?=get_permalink();?>">Read More...</a></button>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();?>
            <?php $total_pages = $data->max_num_pages;?>
            <div class="pagination">
            <?php if ( $total_pages > 1 ) {
                        $current_page = max(1, get_query_var('paged'));
                
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« prev'),
                            'next_text'    => __('next »'),
                        ));
                    } else {
                       // echo'404 Error&#58; Not Found';
                    }       
                ?>
            </div>
            <?php endif;wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php get_footer();?>
