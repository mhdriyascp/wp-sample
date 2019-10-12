<?php
/**
 *  Template Name: All Jobs
 * 
 */
get_header()?>
 <div class="All-jobs container">
    <div class="row">
    <?php if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    ?>  
        <?=the_content();?></p>
        
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
 </div>
 <?=get_footer();?>