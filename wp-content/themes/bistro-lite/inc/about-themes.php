<?php
//about theme info
add_action( 'admin_menu', 'bistro_lite_abouttheme' );
function bistro_lite_abouttheme() {    	
	add_theme_page( esc_html__('Theme Info', 'bistro-lite'), esc_html__('Theme Info', 'bistro-lite'), 'edit_theme_options', 'bistro_lite_guide', 'bistro_lite_mostrar_guide');   
} 

//guidline for about theme
function bistro_lite_mostrar_guide() { 
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Info', 'bistro-lite'); ?>
		   </div>
           <div class="centerbold">
				<a href="<?php echo esc_url(BISTRO_LITE_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'bistro-lite'); ?></a> | 
				<a href="<?php echo esc_url(BISTRO_LITE_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'bistro-lite'); ?></a> | 
				<a href="<?php echo esc_url(BISTRO_LITE_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'bistro-lite'); ?></a>
                <div class="space5"></div>
			</div>
          <p><?php esc_html_e('Bistro Lite is a food related WordPress theme and can be used by Chefs, restaurants, bistro, cafes, coffee shops, caterers, food and recipe business, hotel, menu and order takeaways and pizza delivery services. Other than this it can be used for hotel and accomodation, hotel and motel booking and resorts, vacation homes, lodge, tourist places etc. Changing color, images etc is possible so can be used by salon, spa, and other such services as well.','bistro-lite'); ?></p>
		  <a href="<?php echo esc_url(BISTRO_LITE_FREE_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.jpg" alt="" /></a>
	</div><!-- .col-left -->
	<!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>