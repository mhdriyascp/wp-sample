<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

<div class="page-not-found">
<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
</div>
	
<?php get_footer(); ?>
