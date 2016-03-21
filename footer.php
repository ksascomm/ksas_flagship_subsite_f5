  <footer>
	<?php //Switch to krieger.jhu.edu for navigation menus
		global $switched;
		switch_to_blog(1);
	?>
  	<div class="row">
		<?php wp_nav_menu( array( 
		'theme_location' => 'quick_links', 
		'menu_class' => 'nav-bar', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_id' => 'quicklinks',
		'container_class' => 'small-10 medium-3 columns', 
		'walker' => new foundation_navigation() ) ); ?>
  		
		<?php wp_nav_menu( array( 
		'theme_location' => 'footer_links', 
		'menu_class' => 'inline-list', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_class' => 'medium-7 columns', 
		'walker' => new foundation_navigation() ) ); ?>
		
		<?php //switch back to the current site
		restore_current_blog();
		?>	
		<nav class="small-12 medium-2 columns" id="social-media">
				<div class="small-6 columns">
					<a href="http://facebook.com/jhuksas" title="Facebook"><i class="fa fa-facebook-official fa-3x"></i></a>
				</div>
				<div class="small-6 columns">
					<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><i class="fa fa-youtube-square fa-3x"></i></a>
				</div>
		</nav>
  	</div>
  </footer>

  <?php locate_template('parts-script-initiators.php', true, false); ?>
  
  <?php $theme_option = flagship_sub_get_global_options();

  		if ( $theme_option['flagship_sub_parent_id']  == 'research' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-872').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } if ( $theme_option['flagship_sub_parent_id']  == 'about' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-808').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } if ( $theme_option['flagship_sub_parent_id']  == 'academics' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-813').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } if ( $theme_option['flagship_sub_parent_id']  == 'admissions' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-899').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } if ( $theme_option['flagship_sub_parent_id']  == 'news' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-885').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } if ( $theme_option['flagship_sub_parent_id']  == 'giving' ) { ?>
	    <script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-897').addClass('current_page_ancestor');
			$j('#menu-item-<?php echo $theme_option['flagship_sub_menu_id']; ?>').addClass('current_page_parent');
			});
		</script>
<?php } ?>

<?php if ( is_front_page()) { ?>

<?php } wp_footer(); ?>