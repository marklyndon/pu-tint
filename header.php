<?php 
/* Added this to fix IE Compatibility mode issue - 
when opening in IE8, the browser was automatically going into compatibility mode 
displaying content incorrectly. The <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
did not appear to be working in this instance and could be something to do with Intranet settings */
	 
header("X-UA-Compatible: IE=Edge");

?><!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	<!-- Bootstrap -->
    <link href="<?php bloginfo( 'template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- My Template Sytlesheet -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <style>
    .aligncenter{
        display:block;
	    margin:5px auto;
    }
    </style>
    
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
	/* $$ TIS */
	$logoOptions= pu201308magbasic_theme_options( 'logoChoice' );
	$colourOptions= pu201308magbasic_theme_options( 'colourChoice' );
	/* $$ End of TIS */
	?>
	<header id="header" role="banner">
		<div class="container">
			<div class="row">
			<div class="col-md-8 title-logo-wrapper <?php echo $header_class2; ?>">
				<hgroup>
					<?php /* $$ TIS */?>
					<div class="pu_logo">
						<div class="neuzit sizea"><a href="<?php echo esc_url( home_url() ); ?>"><span id="tagline" style="color: <?php echo "#".$colourOptions;?>"><?php echo $logoOptions;?></span><br />With<br />Plymouth<br />University</a></div>
						</div>
					</div><!-- .col-md-8 -->
      	
      	
      	<div class="col-md-4 site-desc-block">
	        <h1 id="site-title"><a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( pu_theme_options( 'tagline' ) ) { ?><h2 id="site-description"><?php bloginfo( 'description' ); ?></h2><?php } ?>
        </div><!-- .col-md-4 -->
				</hgroup>
			
			</div><!-- .row -->
			
			<!-- MENU -->
			<div class="row">
				<div id="nav" class="col-md-12">
					<?php
						if ( function_exists('has_nav_menu') && has_nav_menu('primary') ) {
							$nav_menu = array('theme_location' => 'primary', 'depth' => '2');
							wp_nav_menu($nav_menu);
						} else { ?>
							<ul class="sf-menu">
								<?php
								$pageargs = array(
								'depth'        => 1,
								'title_li'     => '',
								'echo'         => 1,
								'authors'      => '',				
								'link_before'  => '',
								'link_after'   => '',
								'walker' => '' );
								wp_list_pages($pageargs);?>
							</ul>
					<?php } ?>
				</div>    
			</div> <!-- .row -->
		</div><!-- .container -->
	</header><!-- #header -->