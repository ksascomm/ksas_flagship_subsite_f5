<?php get_header(); ?>
<?php
	if ( false === ( $sub_research_slider_query = get_transient( 'sub_research_slider_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$sub_research_slider_query = new WP_Query(array(
				'post_type' => 'profile',
				'category_name' => 'homepage',
				'orderby' => 'rand', 
				'order' => 'ASC',
				'posts_per_page' => '5'));
			set_transient( 'sub_research_slider_query', $sub_research_slider_query, 86400 ); }
?>
<?php if ($sub_research_slider_query->have_posts()) : ?>
<div class="row hide-for-small-only" role="marquee">
	<div class="slideshow-wrapper">
		<div class="preloader"></div>

		<?php if ($sub_research_slider_query->post_count == 1) : ?>
			<ul id="slider" data-orbit data-options="navigation_arrows:false; bullets:false; slide_number:false;">
		<?php else :?> 
			<ul id="slider" data-orbit data-options="animation: fade; animation_speed:2000; timer:false; timer_speed:4000; navigation_arrows:true; bullets:false; slide_number:false;">
		<?php endif; ?>

				<?php while ($sub_research_slider_query->have_posts()) : $sub_research_slider_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
							<article class="slide" aria-labelledby="post-<?php the_ID(); ?>">
								<?php the_post_thumbnail('slider', array('class' => 'radius-top')); ?>	
								<div class="orbit-caption">						
									<summary class="small-4 small-offset-8 columns black_bg vertical radius-topright caption">
										<div class="middle">
											<h1 class="white"><?php the_title(); ?></h1>
											<p class="white"><?php $tagline = get_post_meta($post->ID, 'ecpt_pull_quote', true); echo strip_tags($tagline); ?></p>
											<p class="yellow">Read More <span class="icon-arrow-right14"></span></p>
										</div>
									</summary>
								</div>
							</article>
						</a>
					</li>
				<?php endwhile; ?>								
			</ul>
	</div>
</div>
<?php endif; ?>
<div class="row sidebar_bg radius10">
	<main class="small-12 large-8 columns wrapper toplayer">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title();?></h1>	
				<?php the_content(); ?>			
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
			<article class="small-12 columns" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<h5 class="black">
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title();?></a>
				</h5>
					<?php if ( has_post_thumbnail()) : ?> 
						<div class="floatright">
							<?php the_post_thumbnail('rss', array('itemprop' => 'image')); ?>
						</div>
					<?php endif; ?>
					<summary><?php the_excerpt(); ?></summary>
					<hr>
			</article>
		</div>
		<?php endwhile; ?>
		
	</main>	<!-- End main content (left) section -->
	<?php locate_template('/parts/nav-sidebar.php', true, false); ?>	
</div> <!-- End #landing -->
<?php get_footer(); ?>