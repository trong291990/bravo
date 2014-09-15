<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Blain
 */
const MAIN_SITE_URL = "http://bravoindochinatour.com/";
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <link media="all" type="text/css" rel="stylesheet" href="http://bravoindochinatour.com/fonts/font-awesome.min.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	
        <div id="main-nav-warrper" class="navbar navbar-default" role="navigation">
                <div id="main-nav-container" class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a id="main-logo" class="navbar-brand" href="http://bravoindochinatour.com/">
                            <img alt="Bravo Indochina Tours" src="http://bravoindochinatour.com/frontend/images/page/main_logov2.jpg" class="img-responsive">
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div id="main-nav" class="navbar-collapse collapse">
                       <ul class="nav navbar-nav pull-right">
                            <li class="active"><a href="http://bravoindochinatour.com">Home</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">About Us <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Why travel with us</a></li>
                                    <li><a href="http://bravoindochinatour.com/terms-and-condition">Term &amp; Condition</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Join Our Team</a></li>
                                    <li><a href="#">Travel Album</a></li>
                                    <li><a href="http://bravoindochinatour.com/about-us">About Us</a></li>
                                </ul>
                            </li>      
                            <li><a href="http://bravoindochinatour.com/indochina-travel-blog/">Blog</a></li>
                            <li><a href="http://bravoindochinatour.com/travel-reviews">Reviews</a></li>
                            <li><a href="http://bravoindochinatour.com/contact">Contact</a></li>
                            <li>
                                <form style="display: none" action="http://bravoindochinatour.com/tours/search" id="search-form" novalidate="novalidate">
                                    <input type="text" value="" name="keyword" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    <div id="blog-heading">
                        <h2>SPEAK TO OUR EXPERT 18001059</h2>
                        <p>Blog Management by Bravo Tours Co.,Ltd</p>
                    </div>
                </div>
                <div class="container" id="blog-banner-container">

                </div>
            </div>

	<div  style="display: none" class="nav-wrapper container">
            <nav id="site-navigation" class="navbar navbar-default main-navigation" role="navigation">
			
			<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		  </div>
		  
			
			<?php
			    wp_nav_menu( array(
			        'theme_location'    => 'primary',
			        'depth'             => 2,
			        'container'         => 'div',
			        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
			        'menu_class'        => 'nav navbar-nav',
			        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			        'walker'            => new wp_bootstrap_navwalker())
			    );
?>
		</nav><!-- #site-navigation -->
	</div>
	<div id="content" class="site-content row container">
	<?php
	if ( (function_exists( 'of_get_option' )) && (of_get_option('slidetitle5',true) !=1) ) {
	if ( ( of_get_option('slider_enabled') != 0 ) && (is_home())  )  
		{ ?>
	<div class="slider-wrapper theme-default"> 
    	<div class="ribbon"></div>    
    		<div id="slider" class="nivoSlider">
    			<?php
		  		$slider_flag = false;
		  		for ($i=1;$i<6;$i++) {
		  			$caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
					if ( of_get_option('slide'.$i, true) != "" ) {
						echo "<a href='".of_get_option('slideurl'.$i, true)."'><img src='".of_get_option('slide'.$i, true)."' title='".$caption."'></a>"; 
						$slider_flag = true;
					}
				}
				?>  
    		</div><!--#slider-->
    		<?php for ($i=1;$i<6;$i++) {
    				$caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
    				if ($caption != "")
    				{
	    				echo "<div id='caption_".$i."' class='nivo-html-caption'>";
	    				echo "<a href='".of_get_option('slideurl'.$i, true)."'><div class='slide-title'>".of_get_option('slidetitle'.$i, true)."</div></a>";
	    				echo "<div class='slide-description'>".of_get_option('slidedesc'.$i, true)."</div>";
	    				echo "</div>";
    				}
    			}	
    	    
			?>
    </div>	
	<?php 
			}
		}
		?>
