	<aside class="small-12 large-4 columns hide-for-print" id="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">  
		<div class="blue_bg radius-topright offset-gutter" id="sidebar_header">
			<h5 class="white"><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>" class="white"><?php bloginfo('name'); ?></a></h5>
		</div>
		<!--Begin Site Navigation Links -->
		
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'nav', 
				'fallback_cb' => 'foundation_page_menu', 
				'depth' => 2 )); ?> 
		
		<!--End Site Navigation Links -->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('under-nav-sb') ) : ?><?php endif; ?>
	</aside> <!-- End Sidebar -->
