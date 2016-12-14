



<?php 

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $custom_args = array(
      'post_type' => 'post',
      'posts_per_page' => 2,
      'paged' => $paged
    );

  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>





        <!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('mainArticle'); ?>>

                 
            
		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->

		<!-- post title -->
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		

		<?php the_content(); ?>
                <?php the_post_thumbnail('full'); ?>
                
                
                
              

               <div class="postSocials">
                   <h3>Share This:</h3>
                   <a href="https://twitter.com/home?status= <?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
                       <button><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</button>
                   </a>
                   <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                        <button><i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;FaceBook</button>
                   </a>
                   <a href="https://plus.google.com/share?url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
                       <button><i class="fa fa-google-plus" aria-hidden="true"></i>&nbsp;Google</button>
                   </a>
                   <a href="#"><button><i class="fa fa-tumblr" aria-hidden="true"></i>Tumbler</button></a>
                   <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                       <button><i class="fa fa-linkedin" aria-hidden="true"></i>&nbsp;LinkedIn</button>
                   </a>
                   <a href="https://pinterest.com/pin/create/button/?url=http://blog.hubspot.com/marketing/marketing-skills-promotion&amp;media=http://cdn2.hubspot.net/hub/53/file-918728117-jpg/Blog-Related_Images/running-up-steps.jpg?t=1401910686913&amp;description=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                       <button><i class="fa fa-pinterest-p" aria-hidden="true"></i>&nbsp;Pinterest</button>
                   </a>
                   <a href="#"><button><i class="fa fa-reddit-alien" aria-hidden="true"></i>&nbsp;Reddit</button></a>
                   <a href="#"><button><i class="fa fa-get-pocket" aria-hidden="true"></i>&nbsp;Pocket</button></a>
                   <a href="#"><button><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button></a>
                   <a href="#"><button><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Email</button></a>
                   
               </div>
               
                <?php
                    global $withcomments;
                    $withcomments = true;
                    comments_template( '', true );
                    $args = '';
                ?>
   
               <?php comment_reply_link( $args, $comment, $post ); ?>
                
                
                <div class="postBottom">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/helmet.png" alt="helmet">
                    <span class="postDate">Posted on <?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?> |</span> 
                    <span class="postLinks"><a href="#"> Permalink</a> <span class="grayDivider">|</span> <?php comments_number( 'no responses', 'one response', '% responses' ); ?>. </span>

                    <p><?php _e( 'Filed in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

                    <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
                </div>
               
               
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
        <div class="paginationLinks">   
            <span class="leftPagination"><?php previous_post_link('<< Prev');?></span>
            <span class="rightPagination"><?php  next_post_link('Next >>');  ?></span>
        </div>    
           
