<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="upper-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
        
       wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'footer-menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="lower-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	
	);
        
        wp_nav_menu(
	array(
		'theme_location'  => 'mobile-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'mobile-menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	
	);        
}
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'mobile-menu' => __( 'Mobile Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/assets/js/vendor/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!


        wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!


        wp_register_script('html5blankscripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
   if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/assets/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!

    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 180 ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'affiliates'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'affiliates');
    register_post_type('affiliates', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Affiliates', 'affiliates'), // Rename these to suit
            'singular_name' => __('Affiliates', 'affiliates'),
            'add_new' => __('Add New', 'affiliates'),
            'add_new_item' => __('Add New Affiliates', 'affiliates'),
            'edit' => __('Edit', 'affiliates'),
            'edit_item' => __('Edit Affiliates', 'affiliates'),
            'new_item' => __('New Affiliates', 'affiliates'),
            'view' => __('View Affiliates', 'affiliates'),
            'view_item' => __('View Affiliates', 'affiliates'),
            'search_items' => __('Search Affiliates', 'affiliates'),
            'not_found' => __('No Affiliatess found', 'affiliates'),
            'not_found_in_trash' => __('No Affiliatess found in Trash', 'affiliates')
        ),
         'menu_icon' => 'dashicons-format-image',     
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}
// livereload
if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
  wp_enqueue_script('livereload');
}
//search update
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );
 * 
 */
// woocomerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
//Pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '?page=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => 2,
    'prev_next'       => True,
    'prev_text'       => __('<< Prev'),
    'next_text'       => __('Next >>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    

    if(is_category()){
      $query->set('posts_per_page', 7);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

//mlb standings functions
add_action('bnv_mlb_standings_update', 'bnv_update_mlb_standings');
add_action('wp', 'bnv_update_activation');
function bnv_update_activation(){
  if(!wp_next_scheduled('bnv_mlb_standings_update')){
    wp_schedule_event(current_time('timestamp'), 'hourly', 'bnv_mlb_standings_update');
  }
}

function bnv_update_mlb_standings(){
  $url = 'https://erikberg.com/mlb/standings.json';
  $user_agent_email = 'jcampbell@childressagency.com';
  $user_agent_version = '1.1';

  $raw_mlb_standings = bnv_get_mlb_standings($url, $user_agent_email, $user_agent_version);
  $mlb_standings = json_decode($raw_mlb_standings);
  
  if(!empty($mlb_standings)){
    global $wpdb;
    $standings = $mlb_standings->standing;
    $standings_date = $mlb_standings->standings_date;
    $i=0;
    
    //clear out the table
    $wpdb->query("TRUNCATE TABLE mlb_standings");
    
    foreach($standings as $standing){
      $wpdb->insert(
        'mlb_standings',
        array(
          'standings_date' => $standings_date,
          'rank' => $standing->rank,
          'won' => $standing->won,
          'lost' => $standing->lost,
          'streak' => $standing->streak,
          'ordinal_rank' => $standing->ordinal_rank,
          'first_name' => $standing->first_name,
          'last_name' => $standing->last_name,
          'team_id' => $standing->team_id,
          'games_back' => $standing->games_back,
          'points_for' => $standing->points_for,
          'points_against' => $standing->points_against,
          'home_won' => $standing->home_won,
          'home_lost' => $standing->home_lost,
          'away_won' => $standing->away_won,
          'away_lost' => $standing->away_lost,
          'conference_won' => $standing->conference_won,
          'conference_lost' => $standing->conference_lost,
          'last_five' => $standing->last_five,
          'last_ten' => $standing->last_ten,
          'conference' => $standing->conference,
          'division' => $standing->division,
          'points_scored_per_game' => $standing->points_scored_per_game,
          'points_allowed_per_game' => $standing->points_allowed_per_game,
          'win_percentage' => $standing->win_percentage,
          'point_differential' => $standing->point_differential,
          'point_differential_per_game' => $standing->point_differential_per_game,
          'streak_type' => $standing->streak_type,
          'streak_total' => $standing->streak_total,
          'games_played' => $standing->games_played
        ),
        array(
          '%s', //standings_date
          '%d', //rank
          '%d', //won
          '%d', //lost
          '%s', //streak
          '%s', //ordinal_rank
          '%s', //first_name
          '%s', //last_name
          '%s', //team_id
          '%f', //games_back
          '%d', //points_for
          '%d', //points_against
          '%d', //home_won
          '%d', //home_lost
          '%d', //away_won
          '%d', //away_lost
          '%d', //conference_won
          '%d', //conference_lost
          '%s', //last_five
          '%s', //last_ten
          '%s', //conference
          '%s', //division
          '%s', //points_scored_per_game
          '%s', //points_allowed_per_game
          '%s', //win_percentage
          '%d', //point_differential
          '%s', //point_differential_per_game
          '%s', //streak_type
          '%d', //streak_total
          '%d', //games_played
        )
      );
    }
  }
}

function bnv_mlb_standings(){
  $standings = array();
  $i=0;
  
  global $wpdb;
  $mlb_standings = $wpdb->get_results("
    SELECT conference, division, rank, won, lost, win_percentage, CONCAT(first_name, ' ', last_name) AS team_name, team_id
    FROM mlb_standings");
  
  foreach($mlb_standings as $standing){
    $conference = $standing->conference;
    $division = $standing->division;
    $rank = $standing->rank;
    $won = $standing->won;
    $lost = $standing->lost;
    $win_percentage = $standing->win_percentage;
    //$first_name = $standing->first_name;
    //$last_name = $standing->last_name;
    //$team_name = $first_name . ' ' . $last_name;
    $team_name = $standing->team_name;
    $team_id = $standing->team_id;
    
    $standings[$conference][$division][$i]['rank'] = $rank;
    $standings[$conference][$division][$i]['won'] = $won;
    $standings[$conference][$division][$i]['lost'] = $lost;
    $standings[$conference][$division][$i]['win_percentage'] = $win_percentage;
    $standings[$conference][$division][$i]['team_name'] = $team_name;
    $standings[$conference][$division][$i]['team_link'] = $team_id;
    
    $i++;    
  }
  
  return $standings;
}

function bnv_get_mlb_standings($url, $user_agent_email, $user_agent_version){
  $ch = curl_init();
  $timeout = 5;
  $user_agent = sprintf('smlstats-exphp/%s (%s)', $user_agent_version, $user_agent_email);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  
  return $data;  
}

function bnv_get_team_rss($team_name){
  switch($team_name){
    case 'boston-red-sox':
      return 'bos.xml';
    break;
    case 'toronto-blue-jays':
      return 'tor.xml';
    break;
    case 'baltimore-orioles':
      return 'bal.xml';
    break;
    case 'new-york-yankees':
      return 'nyy.xml';
    break;
    case 'tampa-bay-rays':
      return 'tb.xml';
    break;
    case 'cleveland-indians':
      return 'cle.xml';
    break;
    case 'detroit-tigers':
      return 'det.xml';
    break;
    case 'kansas-city-royals':
      return 'kc.xml';
    break;
    case 'chicago-white-sox':
      return 'cws.xml';
    break;
    case 'minnesota-twins':
      return 'min.xml';
    break;
    case 'texas-rangers':
      return 'tex.xml';
    break; 
    case 'seattle-mariners':
      return 'sea.xml';
    break;
    case 'houston-astros':
      return 'hou.xml';
    break;
    case 'los-angeles-angels':
      return 'ana.xml';
    break;
    case 'oakland-athletics':
      return 'oak.xml';
    break;
    case 'washington-nationals':
      return 'was.xml';
    break;
    case 'new-york-mets':
      return 'nym.xml';
    break;
    case 'miami-marlins':
      return 'mia.xml';
    break;
    case 'philadelphia-phillies':
      return 'phi.xml';
    break;
    case 'atlanta-braves':
      return 'atl.xml';
    break;
    case 'chicago-cubs':
      return 'chc.xml';
    break;
    case 'st-louis-cardinals':
      return 'stl.xml';
    break;
    case 'pittsburg-pirates':
      return 'pit.xml';
    break;
    case 'milwaukee-brewers':
      return 'mil.xml';
    break;
    case 'cincinnati-reds':
      return 'cin.xml';
    break;
    case 'los-angeles-dodgers':
      return 'la.xml';
    break;
    case 'san-francisco-giants':
      return 'sf.xml';
    break;
    case 'colorado-rockies':
      return 'col.xml';
    break;
    case 'arizona-diamondbacks':
      return 'ari.xml';
    break;
    case 'san-diego-padres':
      return 'sd.xml';
    break;
    default:
      return 'mlb.xml';
  }
}