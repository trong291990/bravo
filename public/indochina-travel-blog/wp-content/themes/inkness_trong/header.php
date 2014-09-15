<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkness
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="parallax-bg"></div>
<div id="page" class="hfeed site">
	<?php do_action( 'inkness_before' ); ?>
	<div id="header-top">
		<header id="masthead" class="site-header row container" role="banner">
                    <div  class="site-branding col-md-6 col-xs-12">
                        <img src="http://bravoindochinatour.com/backend/images/logo.png" />
			</div>	
			<div style="display: none" role="navigation" class="navbar navbar-default" id="main-nav-warrper">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target="#main-nav" data-toggle="collapse" class="navbar-toggle" type="button">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand" id="main-logo">
                            <img class="img-responsive" src="http://bravoindochinatour.com/frontend/images/page/main_logov2.jpg">
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                          <li class="active"><a href="http://bravoindochinatour.com">Home</a></li>
                          <li><a href="http://bravoindochinatour.com/about-us">About</a></li>
                          <li><a href="http://bravoindochinatour.com/contact">Contact</a></li>
                          <li><a href="http://bravoindochinatour.com/terms-and-condition">Term &amp; Condition</a></li>
                          <li><a href="http://bravoindochinatour.com/travel-reviews">Reviews</a></li>
                          <li>
                              <form novalidate="novalidate" id="search-form" action="http://bravoindochinatour.com/tours/search" style="display: none">
                                  <input type="text" placeholder="Search" name="keyword" value="">
                                  <button type="submit"><i class="fa fa-search"></i></button>
                              </form>
                          </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    <div id="country-main-nav-wrapper">
                         <ul class="list-unstyled list-inline">
                            <li><a href="http://bravoindochinatour.com/tours/indochina-tours">Indochina</a></li>
                            <li><a href="http://bravoindochinatour.com/tours/vietnam-tours">Vietnam</a></li>
                            <li><a href="http://bravoindochinatour.com/tours/cambodia-tours">Cambodia</a></li>
                            <li><a href="http://bravoindochinatour.com/tours/laos-tours">Lao</a></li>
                         </ul>
                    </div>
            </div>
            </div>
			<?php get_template_part('social', 'fa'); ?>
						
		</header><!-- #masthead -->
	</div>
	
	<div id="header-2">
		<div class="container">
		<div class="default-nav-wrapper col-md-8 col-xs-12"> 	
		   <nav id="site-navigation" class="main-navigation" role="navigation">
	         <div id="nav-container">
				<h1 class="menu-toggle"></h1>
				<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'inkness' ); ?>"><?php _e( 'Skip to content', 'inkness' ); ?></a></div>
	
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	          </div>  
			</nav><!-- #site-navigation -->
		  </div>
		  
		<div id="top-search" class="col-md-4 col-xs-12">
			<?php get_search_form(); ?>
		</div>
		</div>
	</div>

	<?php get_template_part('slider', 'nivo'); ?>
	
		<div id="content" class="site-content row clearfix clear">
		<div class="container col-md-12"> 
