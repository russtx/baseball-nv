<?php
/* Template Name: Membership Pqge */
get_header(); ?>

<div class="outerWrapper">
        <div class="mainContainer" > 
            <main role="main">
                    <!-- section -->
                    <section class="mainSection leftSide">
                        <span class="mainArticleHeader">
                            <h1><?php the_title(); ?></h1>
                        </span>   
                        <article class="mainArticle">
                            <?php echo do_shortcode('[gravityform id="3" title="true" description="true"]'); ?>
                        </article>
                    </section>
                    <!-- /section -->
                <?php get_sidebar(); ?>    
                    
            </main>
    </div><!-- mainContainer -->    
</div><!-- outerWrapper -->            



<?php get_footer(); ?>
