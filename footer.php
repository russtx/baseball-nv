

</div><!-- /wrapper -->			



			<footer class="footer" role="contentinfo">
                           
                            
                            <div class="upperFooter">
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
                            </div><!--upperFooter -->
                            
                            <div class="lowerFooter">
                                <a href="<?php echo home_url(); ?>">
                                    <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Footer Logo" >

                                </a>
                                
                                <div class="footerMenu">
                                        <?php html5blank_nav(); ?>
                                </div>
                                
				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?>&nbsp;<?php bloginfo('name'); ?> 
					
				</p>
				<!-- /copyright -->
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
