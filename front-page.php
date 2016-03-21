<?php get_header(); ?>
<?php
	if ( false === ( $sub_research_slider_query = get_transient( 'sub_research_slider_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$sub_research_slider_query = new WP_Query(array(
				'post_type' => 'profile',
				'category_name' => 'homepage',
				'order' => 'rand',
				'posts_per_page' => '5'));
			set_transient( 'sub_research_slider_query', $sub_research_slider_query, 86400 ); }
?>
<?php if ($sub_research_slider_query->have_posts()) : ?>
<div class="row hide-for-small-only">
	<div class="slideshow-wrapper">
		<div class="preloader"></div>
		<ul id="slider" data-orbit data-options="animation: fade; animation_speed:2000; timer:true; timer_speed:5000; navigation_arrows:false; bullets:false; slide_number:false;">

		<?php while ($sub_research_slider_query->have_posts()) : $sub_research_slider_query->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<div class="slide">
						<?php the_post_thumbnail('slider', array('class' => 'radius-top')); ?>
						
								<summary class="small-4 small-offset-8 columns black_bg vertical radius-topright" id="caption">
									<div class="middle">
										<h3 class="white"><?php the_title(); ?></h3>
										<h5 class="white italic"><?php $tagline = get_post_meta($post->ID, 'ecpt_pull_quote', true); echo strip_tags($tagline); ?></h5>
										<h6 class="yellow">Read More <span class="icon-arrow-right-2"></span></h6>
									</div>
								</summary>
					</div>
				</a>
			</li>
		<?php endwhile; ?>
										
		</ul>
	</div>
</div>
<?php endif; ?>
<div class="row sidebar_bg radius10">
	<?php locate_template('parts-nav-sidebar.php', true, false); ?>	
	<div class="small-12 medium-8 medium-pull-4 columns wrapper toplayer">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<h1><?php the_title();?></h1>	
				<?php the_content(); ?>			
			</article>
		<?php endwhile; endif; ?>	
		
		
		
		<?php if ( false === ( $sub_news_query = get_transient( 'sub_news_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$theme_option = flagship_sub_get_global_options(); 
			$news_quantity = $theme_option['flagship_sub_news_quantity'];
			$sub_news_query = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => $news_quantity)); 
					set_transient( 'sub_news_query', $sub_news_query, 2592000 ); }
			if ( $sub_news_query->have_posts() ) :
		?>
		<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
		<?php endif; while ($sub_news_query->have_posts()) : $sub_news_query->the_post(); ?>
		<div class="row">		
		<article class="small-12 columns">
				<a href="<?php the_permalink(); ?>">
					<h5 class="black"><?php the_title();?></h5>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="floatright">
							<?php the_post_thumbnail('rss'); ?>
						</div>
					<?php } ?>
					<summary><?php the_excerpt(); ?></summary>
				</a>
				<hr>
		</article>
		</div>
		<?php endwhile; ?>
		
	</div>	<!-- End main content (left) section -->

</div> <!-- End #landing -->
<?php get_footer(); ?>