<?php get_header(); ?>
<main class="row sidebar_bg radius10" id="opp">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">		
		<?php locate_template('/parts/nav-breadcrumbs.php', true, false); ?>	
		<article>
				<h1><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="floatright">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
		</article>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
<?php locate_template('/parts/nav-sidebar.php', true, false); ?>
</main> 
<?php get_footer(); ?> 