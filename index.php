<?php get_header(); ?>

<div class="outerWrapper">
        <div class="mainContainer" >   

            <main role="main">
                    <!-- section -->


                    <section class="mainSection leftSide">




                        <span class="mainArticleHeader">
                            <h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>
                        </span>

                        <?php get_template_part('loop'); ?>

                        <?php get_template_part('pagination'); ?>

                    </section>
                    <!-- /section -->
                    
                    <?php get_sidebar(); ?>
            </main>


                
        </div><!-- mainContainer -->    
</div><!-- outerWrapper -->

<?php get_footer(); ?>
