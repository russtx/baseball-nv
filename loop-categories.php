<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('mainArticle'); ?>>

		

		<!-- post title -->
		<h2>
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/helmet.png" alt="helmet">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		 <div class="stats">
                    <p><?php $comments_count = wp_count_comments(); echo  $comments_count->total_comments . "Comment(s)"; ?></p>
                    <p> <?php //echo_views(get_the_ID()); ?> <?php echo 'Views'; ?></p>
                </div>
                <div class="postBottom">
                   
                    <span class="postDate">Posted on <?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?> |</span> 
                   <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>

                </div>

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
