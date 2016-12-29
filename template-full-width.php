<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
	<main class="row wrapper radius10" id="opp" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="small-12 columns radius10 offset-topgutter">
			<?php locate_template('/parts/nav-breadcrumbs.php', true, false); ?>	
				<h1 itemprop="headline"><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) : ?> 
						<div class="floatright">
							<?php the_post_thumbnail('full', array('class'	=> "radius-topleft", 'itemprop' => 'image')); ?>
						</div>
					<?php endif; ?>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
		</div>	<!-- End main content (left) section -->
	<?php endwhile; endif; ?>	
	</main> 
<?php get_footer(); ?> 