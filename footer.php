

</div><!-- /wrapper -->			



			<footer class="footer" role="contentinfo">
                           
                            
                            <div class="upperFooter">
                                <div class="upperFooterContainer">
                                    <h2>Our Affiliates</h2>
                                    <span>
                                        <a href="#" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hipsters.png" alt="hipsters">
                                        </a>
                                       
                                        <a href="#" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopname.png" alt="shopname">
                                        </a>
                                         <a href="#" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/anchor.png" alt="anchor">
                                        </a>
                                         <a href="#" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bearbrand.png" alt="bearbrand">
                                        </a>
                                         <a href="#" target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/business.png" alt="business">
                                        </a>
                                    </span>
                                </div>
                            </div><!--upperFooter -->
                            
                            <div class="lowerFooter">
                                <div class="lowerFooterContainer">
                                    <a href="<?php echo home_url(); ?>">
                                        <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Footer Logo" >

                                    </a>

                                    <div class="footerMenu">
                                            <?php html5blank_nav(); ?>
                                    </div>

                                    <div class="footerSocials">

                                        <a href="https://twitter.com/home?status= <?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
                                              <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">

                                              <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                              <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                        <span>
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/searchIcon.png" alt="business">
                                            </a>
                                        </span>


                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- copyright -->
                                    <p class="copyright">
                                            &copy; <?php echo date('Y'); ?>&nbsp;<?php bloginfo('name'); ?> 

                                    </p>
                                    <!-- /copyright -->
                                </div>    
                            </div><!-- lowerFooter -->
			</footer><!-- /footer -->

		

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
