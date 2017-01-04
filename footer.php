		<footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<?php //Switch to krieger.jhu.edu for navigation menus
				global $switched;
				switch_to_blog(1);
			?>
		  	<div class="row hide-for-print">
		  		<nav class="medium-3 columns hide-for-small" id="quicklinks" aria-label="Quicklinks Menu">
					<?php wp_nav_menu( array( 
					'theme_location' => 'quick_links', 
					'menu_class' => 'nav-bar', 
					'fallback_cb' => 'foundation_page_menu', 
					'container' => 'false', 
					'walker' => new foundation_navigation() ) ); ?>
		  		</nav>
				
			<?php //switch back to the current site
			restore_current_blog();
			?>

				<!-- Footer Links -->
				<div class="medium-6 columns" role="navigation" aria-labelledby="menu-footer-links">
					<ul id="menu-footer-links" class="inline-list">
						<li role="menuitem"><a href="http://krieger.jhu.edu/about/contact/">Contact/Directory</a></li>
						<li role="menuitem"><a href="http://krieger.jhu.edu/communications-office/">Communications Office</a></li>
						<li role="menuitem"><a href="https://www.jhu.edu/alert/">Emergency Alerts & Info</a></li>
						<li role="menuitem"><a href="http://krieger.jhu.edu/research/policies/">Policies</a></li>
						<li role="menuitem"><a href="http://krieger.jhu.edu/faculty-jobs/">Faculty Job Openings</a></li>
					</ul>
				</div>

				<!-- Social Media -->
				<div class="small-12 medium-3 large-2 columns" id="social-media" role="navigation" aria-labelledby="social-media">
					<div class="small-6 columns">
						<a href="http://facebook.com/jhuksas" title="Facebook"><span class="fa fa-facebook-official fa-3x"></span><span class="screen-reader-text">Facebook</span></a>
					</div>
					<div class="small-6 columns">
						<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-3x"></span><span class="screen-reader-text">YouTube</span></a>
					</div>
				</div>
		  	</div>
		</footer>

		<?php wp_footer(); locate_template('/parts/script-initiators.php', true, false); ?>
		  
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
	</body>
</html>