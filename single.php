<?php get_header(); ?>
<main class="row sidebar_bg radius10" id="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">		
		<?php locate_template('/parts/nav-breadcrumbs.php', true, false); ?>	
		<article class="content news" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<h1 itemprop="headline"><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) : ?> 
						<div class="floatright">
							<?php the_post_thumbnail('full', array('class'	=> "radius-topleft", 'itemprop' => 'image')); ?>
						</div>
					<?php endif; ?>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
		</article>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
<?php locate_template('/parts/nav-sidebar.php', true, false); ?>
</main> 
<?php get_footer(); ?> 