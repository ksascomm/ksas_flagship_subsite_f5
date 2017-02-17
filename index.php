<?php get_header(); ?>

<div class="row sidebar_bg radius10" id="page" role="main" itemprop="mainEntity" itemscope itemtype="http://schema.org/Blog">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">		
			<article class="small-12 columns" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<h3 class="uppercase black" itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></h3>
				<h2 itemprop="headline">
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">	
						<?php the_title();?>
					</a>
				<div class="entry-content" itemprop="text">	
						<?php if ( has_post_thumbnail()) : ?> 
							<div class="floatright">
								<?php the_post_thumbnail('rss', array('itemprop' => 'image')); ?>
							</div>
						<?php endif; ?>
						<?php the_excerpt(); ?>
					
					<hr>
				</div>
			</article>
		</div>
	<?php endwhile; endif; ?>		
	</div>	<!-- End main content (left) section -->
		<?php locate_template('/parts/nav-sidebar.php', true, false); ?>
</div> 
<?php get_footer(); ?> 