<?php
/*
Template Name: Research Profile Search Results
*/
?>
<?php get_header(); ?>

<main class="row sidebar_bg radius10" id="page" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="small-12 large-8 columns wrapper radius-left offset-topgutter">		
		<?php if(empty($_POST['keyword']) == false) {
			$keyword = $_POST['keyword'];
			$keyword_query = array('s' => $keyword); }
		else {
			$keyword_query = array();
		}
		
		if(empty($_POST['affiliation']) == false) {
			$affiliation = $_POST['affiliation'];
			$affiliation_query = array(
			'tax_query' => array(
						'relation' => 'OR',
						array(
						'taxonomy' => 'academicdepartment',
						'field' => 'slug',
						'terms' => $affiliation,
						),
						array(
						'taxonomy' => 'affiliation',
						'field' => 'slug',
						'terms' => $affiliation
						))
			);
			}
		else {
			$affiliation_query = array();
		}
		
		if(empty($_POST['award']) == false) {
			$year = $_POST['award'];
			$year_query = array(
				'meta_query' => array(
						array(
							'key' => 'ecpt_class_year',
							'value' => $year,
						))); }
		else {
			$year_query = array();
		}
		
		$standard_args = array(
					'post_type' => 'profile',
					'posts_per_page' => '25',
					'post_status'=>'publish',
					'paged' => $paged,
					);
		$query_args = array_merge($standard_args, $affiliation_query, $year_query, $keyword_query); 
			

			$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			$research_search_results_query = new WP_Query($query_args);  	?>
					
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title();?></h1>
				<fieldset>
					<form method="post" action="<?php echo site_url('/results'); ?>">
						<div class="small-12 columns">
						    <input type="text" name="keyword" placeholder="Search by name or keyword" />
						    <label for="affiliation" class="bold inline">Affiliation:</label>
						    <select name="affiliation" class="inline" style="width: 50%;">
						    <option value="">Any Affiliation</option>
						    <?php $taxonomies = array('academicdepartment', 'affiliation'); 
						    $terms = get_terms($taxonomies, array(
						    			'hide_empty' => 1,
						    ));
									foreach ( $terms as $term ) {
										echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
				        
										} ?>
						    </select>
						    <label for="award" class="screen-reader-text">Select Year</label>
						    <select name="award" class="inline" style="width: 25%;">
						    <option value="">Any Year</option>
						    	<?php $award_years = get_meta_values('ecpt_class_year');
						    	echo $award_years;
						    		foreach ($award_years as $award_year) {
							    		echo '<option value"' . $award_year . '">' . $award_year . '</option>';
						    		} ?>
						    </select>
						    <input type="submit" class="icon-search" value="Search" />
						</div>
					</form>
				</fieldset>

				<?php the_content(); ?>
			<?php endwhile; endif; ?>
				<ul id="directory">
				<?php while ($research_search_results_query->have_posts()) : $research_search_results_query->the_post(); ?>
				<li class="person">
					<div class="row">
						<article class="small-11 columns centered" aria-labelledby="post-<?php the_ID(); ?>">
							<h4 class="no-margin">
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
						
							<p class="no-margin">
								<?php if ( get_post_meta($post->ID, 'ecpt_class_year', true) ) : ?><span class="attribute"><b>Year:&nbsp;</b><?php echo get_post_meta($post->ID, 'ecpt_class_year', true); ?></span><?php endif; ?>
								
								<?php if (has_term('','academicdepartment', $post->ID) == true || has_term('','affiliation', $post->ID) == true) { ?><span class="attribute"><b>Affiliations:</b> <?php } ?>
								<?php 	//Get the Academic Department Names
								$terms = get_the_terms( $post->ID, 'academicdepartment' );
								    if ( $terms && ! is_wp_error( $terms ) ) : 
								    	$dept_name_array = array();
								    foreach ( $terms as $term ) {
								        $dept_name_array[] = $term->name;
								    }
								    $dept_name = join( ", ", $dept_name_array );
								echo $dept_name; endif;
								//Get the Affiliation Names
								$terms_2 = get_the_terms( $post->ID, 'affiliation' );
								    if ( $terms_2 && ! is_wp_error( $terms_2 ) ) : 
								    	$affil_name_array = array();
								    foreach ( $terms_2 as $term_2 ) {
								        $affil_name_array[] = $term_2->name;
								    }
								    $affil_name = join( ", ", $affil_name_array );
								    	if (has_term('','academicdepartment', $post->ID) == true) { echo ','; } 
								echo ' ' . $affil_name; endif;
								?></span>
							</p>
							
							
							<?php if ( get_post_meta($post->ID, 'ecpt_article_list', true) || get_post_meta($post->ID, 'ecpt_research_pdf', true) || get_post_meta($post->ID, 'ecpt_video', true) ) : ?>

								<h6 class="no-margin"><strong>Multimedia:&nbsp;</strong><?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_article_list', true) || get_post_meta($post->ID, 'ecpt_research_pdf', true) ) : ?><span class="icon-newspaper"></span><?php endif; ?>
							
							<?php if ( get_post_meta($post->ID, 'ecpt_video', true) ) : ?><span class="icon-video-camera2"></span><?php endif; ?>
								</h6>

						<?php if ( get_post_meta($post->ID, 'ecpt_award_name', true) ) : ?><p class="bold no-margin"><?php echo get_post_meta($post->ID, 'ecpt_award_name', true); ?></p><?php endif; ?>

						<?php if ( get_post_meta($post->ID, 'ecpt_pull_quote', true) ) : ?><p><strong>Topic:&nbsp;</strong><?php echo strip_tags(get_post_meta($post->ID, 'ecpt_pull_quote', true)); ?></p><?php endif; ?>
						
						
						</article>
					</div>
				</li>		
				<?php endwhile; ?>
				</ul>
			<div class="row">
				<?php flagship_pagination($research_search_results_query->max_num_pages); ?>		
			</div>
	</div>	<!-- End main content (left) section -->
	<?php locate_template('/parts/nav-sidebar.php', true, false); ?>	

</main> 
<?php get_footer(); ?> 