<?php get_header(); ?>


    <div class="outerWrapper">
        <div class="mainContainer" >
	<main role="main">
		<!-- section -->
		<section class="mainSection leftSide">
                    <span class="mainArticleHeader">
			<h1><?php  single_cat_title(); ?></h1>
                    </span>
                    <div class="paginationSection"><?php get_template_part('pagination'); ?></div>
			<?php get_template_part('loop-categories'); ?>
                    
			

		</section>
		<!-- /section -->
            <?php get_sidebar(); ?>    
                
	</main>


        </div><!-- mainContainer -->    
</div><!-- outerWrapper -->

<?php get_footer(); ?>
