<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
               
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
                            <div class="headerContainer">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="logo-img">
                                                        <h1>The Best Baseball News<br />
                                                            And Topical Views</h1>
                                                </a>
                                            
                                        </div>                                       
					<!-- /logo -->
                                        <div class="headerIcons desktopOnly">
                                            <a href="https://twitter.com/home?status= <?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                            <span>
                                                <a href="#">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-cart.png" alt="shopping-cart" >
                                                    <p>Cart</p>
                                                </a>    
                                            </span>
                                                
                                        </div>
					<!-- nav -->
                                            <nav class="nav" role="navigation">
                                               <input class="menu-btn" type="checkbox" id="menu-btn" />	
                                               <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                                                <?php html5blank_nav(); ?>
                                            </nav><!-- /nav -->
                                            
                                            <div class="clearfix"></div>
                                         
                                         <div class="headerIcons mobileOnly">
                                            <a href="https://twitter.com/home?status= <?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                            
                                             <span>
                                                <a href="#">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-cart.png" alt="shopping-cart" >
                                                    <p>Cart</p>
                                                </a>
                                             </span>
                                                
                                        </div>

                            </div><!--headerContainer -->                
			</header>
			<!-- /header -->
