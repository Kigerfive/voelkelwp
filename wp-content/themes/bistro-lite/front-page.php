<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Bistro Lite
 */
get_header(); ?>

<?php
$hideslide = get_theme_mod('hide_slides', 1);
$hide_pagethreeboxes = get_theme_mod('hide_pagethreeboxes', 1);
$secwithcontent = get_theme_mod('hide_home_secwith_content', 1);
?>
<?php if (!is_home() && is_front_page()) { ?>
<?php if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $bistro_lite_slideno[] = $i;
          $bistro_lite_slidetitle[] = get_the_title();
		  $bistro_lite_slidedesc[] = get_the_excerpt();
          $bistro_lite_slidelink[] = get_permalink();
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $bistro_lite_slideno as $bistro_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $bistro_lite_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $bistro_lite_slidetitle[$k]; ?></h2>
        <p><?php echo esc_html($bistro_lite_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php echo esc_url($bistro_lite_slidelink[$k] ); ?>">
          <strong><?php esc_html_e('Learn More', 'bistro-lite');?></strong>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } ?>
<?php if (!is_home() && is_front_page()) { ?>
<?php if( $hide_pagethreeboxes == '') { ?>
<section id="pagearea">
  <div class="nocurve">	
  <div class="container">
    <div class="center-title">
    <?php $fourboxesheading = get_theme_mod('fourboxes_heading'); ?>
    <?php if (!empty($fourboxesheading)) { ?>	
    <h2><?php echo esc_html($fourboxesheading);?></h2>
    <div class="boxboder"></div>
    <span class="borderbottom"></span> </div>
    <?php } ?>
    <div class="spacecode" style="height:40px;"></div>
    <div class="columns-2"> &nbsp;</div>	   
    <div class="columns-2">
      <?php for($p=1; $p<5; $p++) { ?>
      <?php if( get_theme_mod('page-column'.$p,false)) { ?>
      <?php $querypagethreeboxes = new WP_Query('page_id='.get_theme_mod('page-column'.$p,true)); ?>
      <?php while( $querypagethreeboxes->have_posts() ) : $querypagethreeboxes->the_post(); ?>
      
      <div class="threebox <?php if($p % 3 == 0) { echo "last_column"; } ?>">
      	<div class="serviceboxbg">
     	<a href="<?php echo esc_url( get_permalink() ); ?>">
		 <?php if( has_post_thumbnail() ) { ?>
			<div class="sthumb"><?php the_post_thumbnail();?></div>
          <?php } ?>  
            <h3><?php the_title(); ?></h3>
        </a> 
		<?php the_excerpt(); ?>
        </div>
      </div>
      <?php endwhile;
       wp_reset_postdata(); ?>
      <?php }} ?>
      </div>
      <div class="clear"></div> 
  </div><!-- container -->
  </div>
  
</section><!-- #pagearea -->
<div class="clear"></div>
<?php } } ?>
<?php 
	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
<section id="withcontent">
	<div class="container">
    <?php if( get_theme_mod('sec-with-content-column',false)) { ?>
    <?php $witcontent = new WP_Query('page_id='.get_theme_mod('sec-with-content-column',true)); ?>
    <?php while( $witcontent->have_posts() ) : $witcontent->the_post(); ?>
    <?php if( has_post_thumbnail() ) { ?>
    <div class="w-thumb">
    <?php the_post_thumbnail();?> 	
    </div>
    <div class="w-cont"><h2><?php the_title(); ?></h2><?php the_content(); ?>
	<?php wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bistro-lite' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bistro-lite' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
) );
                                    ?> </div>
    <?php } else{?>
    <div class="w-fullcont"><h2><?php the_title(); ?></h2><?php the_content(); ?>
	<?php wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bistro-lite' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bistro-lite' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
) );
                                    ?> </div>
    <?php } ?>
    <div class="clear"></div>
	<?php endwhile; wp_reset_postdata(); ?>
    <?php } ?>
    </div>
</section>
<?php }} ?>
<div class="container">
     <div class="page_content">
  
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'bistro-lite' ),
							'next_text' => esc_html__( 'Next', 'bistro-lite' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
							
										wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bistro-lite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bistro-lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
                    
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'bistro-lite' ),
							'next_text' => esc_html__( 'Next', 'bistro-lite' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>