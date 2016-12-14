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

                        <div style="clear:both;"></div>
                        <h1 style="font-size:2.5em; color:#2a6fb7; font-family:'Alfa Slab One', cursive;margin-top:1em; margin-bottom:1em;height:2em;">The Latest MLB News</h1>
                        <?php
                          include_once(ABSPATH .WPINC . '/feed.php');
                          $rss_items = array();
                          $rss = fetch_feed('http://mlb.mlb.com/partnerxml/gen/news/rss/mlb.xml');
                          if(!is_wp_error($rss)):
                            $maxitems = $rss->get_item_quantity(10);
                            $rss_items = $rss->get_items(0, $maxitems);
                          endif; 
                        ?>
                          <h4><a href="<?php echo $rss->get_link(); ?>"><?php echo $rss->get_title(); ?></a></h4>
                          <p><?php echo $rss->get_description(); ?></p>
                          
                          <?php if($maxitems == 0): ?>
                            <p>No data.</p>
                          <?php else: ?>
                            <?php foreach($rss_items as $item): ?>
                              <article style="border-bottom:none; padding-bottom:0; display:block; margin-bottom:1.5em; padding-left:10px; padding-right:10px;">
                                <header style="display:block; background:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/helmet.png); background-repeat:no-repeat; margin-bottom:1em;">
                                  <h4 style="margin-bottom:.5em; font-family:'Alfa Slab One'; font-size:1.8em; height:1.3em;">
                                    <a href="<?php echo $item->get_permalink(); ?>" style="display:block; margin-left:35px;"><?php echo $item->get_title(); ?></a>
                                  </h4>
                                </header>
                                <?php 
                                  $author = $item->get_author();
                                  $author_name = $author ? $author->get_name() : 'MLB News';
                                ?>
                                <p><?php echo $author_name; ?>, <?php echo $item->get_date(); ?></p>
                                <footer style="display:block; color:#888; font-size:1.5em; line-height:1.4;"><?php echo $item->get_content(); ?></footer>
                              </article>
                            <?php endforeach; ?>
                          <?php endif; ?>


                    </section>
                    <!-- /section -->
                    
                    <?php get_sidebar(); ?>
            </main>


                
        </div><!-- mainContainer -->    
</div><!-- outerWrapper -->

<?php get_footer(); ?>
