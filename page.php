<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="opp">
<?php locate_template('parts-nav-sidebar.php', true, false); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<main class="small-12 medium-8 medium-pull-4 columns wrapper radius-left offset-topgutter">
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
				<h1><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="floatright">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
	</main>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
</div> 
<?php get_footer(); ?> 