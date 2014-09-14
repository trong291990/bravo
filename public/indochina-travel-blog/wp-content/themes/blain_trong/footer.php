<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blain
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container row" role="contentinfo">
            <div class="row" id="footer">
                <div id="footer-left" class="col-sm-12  clearfix">
                    <div class="col-sm-3 no-padding-left">
                        <p>What other travel Bravo Us <br> &nbsp;</p>
                        <div>
                            <a href="http://www.yelp.com.sg/biz/bravo-indochina-tours-and-travel-singapore">
                                <img src="http://bravoindochinatour.com/frontend/images/page/yelp.png" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p>Checkout what other travelers <br>Bravo us On TripAdvisor</p>
                        <div>
                            <a href="http://www.tripadvisor.com/Attraction_Review-g293924-d7057241-Reviews-Bravo_Tours_Day_Tours-Hanoi.html" target="_blank">
                                 <img src="http://bravoindochinatour.com/frontend/images/page/tripadvisor.png" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                         <p>Checkout what our client said <br> &nbsp;</p>
                        <div>
                             <a href="http://www.reviewcentre.com/Tour-Companies/Bravo-Indochina-Tours-www-bravoindochinatour-com-reviews_2826805">
                                 <img src="http://bravoindochinatour.com/frontend/images/page/review_cente.png" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 no-padding-right">
                        <p>Contact us for reservations and questions 19001578 </p>
                        <div id="intro-socials">
                            <ul class="list-unstyled list-inline">
                                <li><a href="https://facebook.com/bravoindochinatour"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/bravo-indochina-tours"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/+bravoindochina"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
		<div id="footertext" class="col-md-7">
        	<?php
			if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
			 	echo of_get_option('footertext2', true); } ?>
        </div>   
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php		
	if ( (function_exists( 'of_get_option' ) && (of_get_option('footercode1', true) != 1) ) ) {
			 	echo of_get_option('footercode1', true); } ?>
<?php wp_footer(); ?>
</body>
</html>