<?php 
  /* Template Name: Team Page */
  get_header(); ?>

<div class="outerWrapper">
        <div class="mainContainer" > 
            <main role="main">
                    <!-- section -->
                    <section class="mainSection leftSide">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <span class="mainArticleHeader" style="margin-bottom:20px;">
                            <h1><?php the_title(); ?></h1>
                        </span>   
                            
                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class('mainArticle'); ?>>
                                <span class="subHeader">
                                    <h2><?php echo get_post_meta($post->ID, 'sub-title', true); ?></h2>
                                </span>

                                <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                                <p><img src="<?php echo $image; ?>" class="aligncenter" alt="" />

                                    <br class="clear">

                            </article>
                            <!-- /article -->
                            <h1 style="fon-size:2.5em; color:#2a6fb7; font-family:'Alfa Slab One', cursive; margin-top:1em; margin-bottom:1em; height:2em;">The Latest <?php echo get_the_title(); ?> News</h1>
                            <?php 
                              $team_name = get_post_field('post_name');
                              $team_rss = bnv_get_team_rss($team_name);
                              
                              include_once(ABSPATH .WPINC . '/feed.php');
                              $rss_items = array();
                              $rss = fetch_feed('http://mlb.mlb.com/partnerxml/gen/news/rss/' . $team_rss);
                              if(!is_wp_error($rss)){
                                $maxitems = $rss->get_item_quantity(10);
                                $rss_items = $rss->get_items(0, $maxitems);
                              }
                            ?>
                            <h4><a href="<?Php echo $rss->get_link(); ?>"><?php echo $rss->get_title(); ?></a></h4>
                            <p><?php echo $rss->get_description(); ?></p>
                            
                            <?php if($maxitems == 0): ?>
                              <p>No data.</p>
                            <?php else: ?>
                              <?php foreach($rss_items as $item): ?>
                                <article style="border-bottom:none; padding-bottom:0; display:block; margin-bottom:1.5em; padding-left:10px; padding-right:10px;">
                                  <header style="display:block; background:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/helmet.png); background-repeat:no-repeat; margin-bottom:1em;">
                                    <h4 style="margin-bottom:.5em; font-family:'Alpha Slab One', cursive; font-size:1.8em; height:1.3em;">
                                      <a href="<?php echo $item->get_permalink(); ?>" style="display:block; margin-left:35px;"><?php echo $item->get_title(); ?></a>
                                    </h4>
                                  </header>
                                  <?php
                                    $author = $item->get_author();
                                    $author_name = $author ? $author->get_name() : 'MLB News';
                                  ?>
                                  <p><?php echo $author_name; ?>, <?php echo $item->get_date(); ?></p>
                                  <footer style="display:block; color:#888; font-size:1.5em; line-height:1.4"><?php echo $item->get_content(); ?></footer>
                                </article>
                              <?php endforeach; ?>
                            <?php endif; ?>

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
