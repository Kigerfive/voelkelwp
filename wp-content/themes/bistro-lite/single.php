<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Bistro Lite
 */

get_header(); ?>

<div class="container">
     <div class="page_content">
        <section class="site-main">            
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <div>
                    	<?php 
						 the_post_navigation( array(
						'prev_text'                  => __( 'Prev: %title', 'bistro-lite'),
						'next_text'                  => __( 'Next: %title', 'bistro-lite'),
						'in_same_term'               => true,
						'taxonomy'                   => __( 'post_tag', 'bistro-lite'),
						'screen_reader_text' => __( 'Continue Reading', 'bistro-lite'),
        				) );
						?>
                    </div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>          
         </section>       
        <?php get_sidebar();?>
       
        <div class="clear"></div>
    </div><!-- page_content -->
</div><!-- container -->	
<?php get_footer(); ?>