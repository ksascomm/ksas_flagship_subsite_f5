<?php get_header(); ?>
	<div class="row sidebar_bg radius10" id="page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<main class="small-12 large-8 columns wrapper radius-left offset-topgutter" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<?php locate_template('/parts/nav-breadcrumbs.php', true, false); ?>	
					<h1 itemprop="headline">
						<?php the_title();?>
					</h1>
					<?php if ( has_post_thumbnail()) : ?> 
						<div class="floatright">
							<?php the_post_thumbnail('full', array('class'	=> "radius-topleft", 'itemprop' => 'image')); ?>
						</div>
					<?php endif; ?>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
			</main>	<!-- End main content (left) section -->
		<?php endwhile; endif; ?>	
	<?php locate_template('/parts/nav-sidebar.php', true, false); ?>
	
	</div> 
<?php get_footer(); ?> 