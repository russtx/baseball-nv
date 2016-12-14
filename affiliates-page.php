<?php 
/* Template Name: Affiliates Page */
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
                               
                               
                                
                                <?php    
                              $args = array( 'post_type' => 'affiliates','orderby' =>  'ASC', 
                                  'posts_per_page' => '10' );  
                              $loop = new WP_Query( $args );while ( $loop->have_posts() ) : $loop->the_post();?>        
                                
                                <div class="affiliateImg">  
                                  <?php the_post_thumbnail('full'); ?>
                                </div>
                             <?php endwhile; ?>
                            </article>
                                     

                    </section>
                    <!-- /section -->
                <?php get_sidebar(); ?>    
                    
            </main>
    </div><!-- mainContainer -->    
</div><!-- outerWrapper -->            



<?php get_footer(); ?>
