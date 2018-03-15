<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Bistro Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header_wrap layer_wrapper">
<!--HEADER STARTS-->

<?php 
	$contact_add = get_theme_mod('contact_add');
	$contact_no = get_theme_mod('contact_no'); 
	$contact_mail = get_theme_mod('contact_mail');
	$fb_link = get_theme_mod('fb_link'); 
	$twitt_link = get_theme_mod('twitt_link');
	$gplus_link = get_theme_mod('gplus_link');
	$linked_link = get_theme_mod('linked_link');
	$opening_time = get_theme_mod('opening_time');
?>  
 

<!--HEAD INFO AREA-->
<?php if(!empty($contact_add) || !empty($contact_no) || !empty($contact_mail) || !empty($fb_link) || !empty($twitt_link)  || !empty($gplus_link)  || !empty($linked_link)){?>
<div class="head-info-area">
<div class="center">
<div class="left">
        <?php if(!empty($opening_time)){?>     
        <span class="emltp">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-time.png" alt="" /><?php echo esc_html($opening_time); ?></span>
        <?php } ?> 
			        <?php if(!empty($contact_add)){?>
		 <span class="phntp">
          <span class="phoneno"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-location.png" alt="" /> 
          <?php echo esc_html($contact_add); ?></span>
        </span>
        <?php } ?> 
</div> 
		<div class="right"> 
          <?php if(!empty($contact_no)){?>
		 <span class="phntp">
          <span class="phoneno"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone.png" alt="" /> 
          <?php echo esc_html($contact_no); ?></span>
        </span>
        <?php } ?> 
		</div>
<div class="clear"></div>                
</div>
</div>
<?php } ?>
 
<!--HEADER ENDS--></div>
<?php $hideslide = get_theme_mod('hide_slides', 1); ?>
<div class="header <?php if(!is_home() && is_front_page()){ if( $hideslide == '') { ?>headtrans<?php }} ?>">
  <div class="container">
    <div class="logo">
		<?php bistro_lite_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo $description; ?></p>                          
        <?php endif; ?>
        </a>
    </div>
    <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_attr_e('Menu','bistro-lite'); ?></a></div> 
        <div class="sitenav <?php if( $hideslide != '' || !is_home() && !is_front_page()) { ?>sitenavblack<?php } ?>">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav--> 
    <div class="clear"></div>
  </div> <!-- container -->
</div><!--.header -->