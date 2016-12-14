<?php get_header(); ?>

<div class="outerWrapper">
        <div class="mainContainer" >
	<main role="main">
		<!-- section -->
		<section class="mainSection leftSide" >

			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
                <?php get_sidebar(); ?>
	</main>


    </div><!-- mainContainer -->    
</div><!-- outerWrapper -->  
<?php get_footer(); ?>
