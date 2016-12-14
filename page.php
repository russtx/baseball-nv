<?php get_header(); ?>

<div class="outerWrapper">
        <div class="mainContainer" > 
            <main role="main">
                    <!-- section -->
                    <section class="mainSection leftSide">
                        <span class="mainArticleHeader">
                            <h1><?php the_title(); ?></h1>
                        </span>   
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                            
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/helmet.png" alt="Logo" class="helmet-img">

                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class('mainArticle'); ?>>
                                <span class="subHeader">
                                    <h2><?php echo get_post_meta($post->ID, 'sub-title', true); ?></h2>
                                </span>
                                    <?php the_content(); ?>

                                    <?php comments_template( '', true ); // Remove if you don't want comments ?>

                                    <br class="clear">

                                    <?php edit_post_link(); ?>

                            </article>
                            <!-- /article -->

                    <?php endwhile; ?>

                    <?php else: ?>

                            <!-- article -->
                            <article>

                                    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                            </article>
                            <!-- /article -->

                    <?php endif; ?>

                    </section>
                    <!-- /section -->
                <?php get_sidebar(); ?>    
                    
            </main>
    </div><!-- mainContainer -->    
</div><!-- outerWrapper -->            



<?php get_footer(); ?>
