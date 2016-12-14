<?php get_header(); ?>
    <div class="outerWrapper">
        <div class="mainContainer" > 
            <main role="main">
                    <!-- section -->
                    <section class="mainSection leftSide">

                            <!-- article -->
                            <article id="post-404" class="mainArticle">
                                <span class="mainArticleHeader">
                                    <h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
                                </span>   
                                    <h2>
                                            <a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
                                    </h2>

                            </article>
                            <!-- /article -->

                    </section>
                    <!-- /section -->
                    <?php get_sidebar(); ?>
            </main>
    </div><!-- mainContainer -->    
</div><!-- outerWrapper --> 


<?php get_footer(); ?>
