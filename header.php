<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="date" content="<?php the_modified_date(); ?>" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />
  
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/style.min.css">
  
  <!-- CSS Files: Conditionals -->
  
  <!-- Modernizr and Jquery Script -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/modernizr.min.js"></script>
  <?php wp_enqueue_script('jquery'); ?> 
  <?php wp_head(); ?>
  <?php $theme_option = flagship_sub_get_global_options(); ?>
	<!-- Make IE a modern browser -->
	<!--[if IE]>
		<script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/css3-mediaqueries/0.1/css3-mediaqueries.min.js"></script>
	<![endif]-->
  	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/app.ie.css">
		<div data-alert class="alert-box alert">
		<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.'); ?>	
		</div>		
	<![endif]-->
  <?php include_once("analytics.php") ?> 
</head>
<?php global $blog_id;
	$site_id = $blog_id; ?>
<body class="<?php echo $theme_option['flagship_sub_parent_id']; ?> sub-site site-<?php echo $site_id; ?> " itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<a href="#page" class="skipLink">Skip to main content</a>
	<div class="print-only">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/krieger.small.horizontal.blue.jpg" alt="krieger logo">
		<h1><?php bloginfo('name'); ?></h1>
	</div>	
		<div id="mobile-nav" class="hide-for-print">
	  		<div class="row">
		        <div class="small-12 columns">
		  			<div class="mobile-logo"><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu.png" alt="jhu logo"></a></div>
		  		</div>
	  		</div>
		</div>
		<div id="desktop-nav" class="hide-for-print">
				<?php get_template_part( '/parts/offcanvas-nav' ); ?>
			<?php //Switch to krieger.jhu.edu for navigation menus
				global $blog_id;
				$current_blog_id = $blog_id;
				switch_to_blog(1);
			?>
			<nav class="row hide-for-print" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" aria-label="Main Menu">
				<?php wp_nav_menu( array( 
					'theme_location' => 'main_nav', 
					'menu_class' => '', 
					'container' => 'div',
					'container_id' => 'main_nav', 
					'container_class' => 'small-12 columns',
					'depth' => 2,
					'fallback_cb' => 'foundation_page_menu',
					'walker' => new foundation_navigation(),
					 )); ?> 
			</nav>
			<?php //switch back to the current site
			switch_to_blog($current_blog_id);
			?>
		</div>
	</header>