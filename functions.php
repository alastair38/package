<?php
ob_start();
/*********************
INCLUDE NEEDED FILES
*********************/

// LOAD JOINTSWP CORE (if you remove this, the theme will break)
require_once(get_template_directory().'/library/joints.php');

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY

include_once(get_template_directory().'/bower_components/acf/acf.php' );

require_once(get_template_directory().'/library/custom-post-type.php'); // you can disable this if you like

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once(get_template_directory().'/library/admin.php');

// SUPPORT FOR OTHER LANGUAGES (off by default)
// require_once(get_template_directory().'/library/translation/translation.php');

/*********************
MENUS & NAVIGATION
*********************/
// REGISTER MENUS
register_nav_menus(
	array(
		'main-nav' => __( 'Main Navigation' ),
        'footer-links' => __( 'Footer Links' ) // main nav in header
	)
);

// THE TOP MENU


// THE MAIN MENU
function joints_main_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'Main Navigation', 'jointstheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	));
} /* end joints main nav */

// THE FOOTER MENU
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'jointstheme' ),   // nav name
    	'menu_class' => 'sub-nav',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

/*********************
SIDEBARS
*********************/

// SIDEBARS AND WIDGETIZED AREAS
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jointstheme'),
		'description' => __('The first (primary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'jointstheme'),
		'description' => __('The offcanvas sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
}

function my_default_content( $post_content, $post ) {
    if( $post->post_type )
    switch( $post->post_type ) {
        case 'page':
        case 'people':
            $post->comment_status = 'closed';
        break;
    }
    return $post_content;
}
add_filter( 'default_content', 'my_default_content', 10, 2 );

/*********************
CHANGE TITLE BOX TEXT FOR NEW SUBMISSIONS BASED ON CUSTOM POST TYPE
*********************/

function wpb_change_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'people' == $screen->post_type ) {
          $title = 'Enter Person Name';
     }

     return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );

/*********************
CREATE INITIAL SETUP PAGES
*********************/

add_action('after_setup_theme', 'create_pages');

function create_pages(){
    $home_page_id = get_option("home_page_id");
    if (!$home_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Home",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);

        update_post_meta($postID, "_wp_page_template", "page.php");
        update_option("home_page_id", $postID);
    }
    $about_page_id = get_option("about_page_id");
    if (!$about_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "About",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
            'comment_status' => 'closed'
        );
        $postID = wp_insert_post($post1, $error);

        update_post_meta($postID, "_wp_page_template", "page-about.php");
        update_option("about_page_id", $postID);
    }
    $contact_page_id = get_option("contact_page_id");
    if (!$contact_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Contact",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);

        update_post_meta($postID, "_wp_page_template", "page-contact.php");
        update_option("contact_page_id", $postID);
    }
    $blog_page_id = get_option("blog_page_id");
    if (!$blog_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Blog",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);

        update_post_meta($postID, "_wp_page_template", "index.php");
        update_option("blog_page_id", $postID);
    }
}

/*********************
CREATE MENU ITEMS FROM SETUP PAGES AND ASSIGN THESE AS MAIN-NAV
*********************/

// Check if the menu exists
$menu_exists = wp_get_nav_menu_object( 'Main Navigation' );

// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu('Main Navigation');

	// Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Home'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('home')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('About'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('about')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Blog'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('blog')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Contact'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('contact')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));

    $locations = get_theme_mod('nav_menu_locations'); //get the menu locations
    $locations['main-nav'] = $menu_id; //set our new menu to be the main nav
    set_theme_mod('nav_menu_locations', $locations); //update
}


/**********************
CREATE BLOG CATEGORIES THAT MAY BE OF USE
**********************/

function insert_category() {
	wp_insert_term(
		'News',
		'category',
		array(
		  'description'	=> '',
		  'slug' 		=> 'news'
		)
	);
    wp_insert_term(
		'Events',
		'category',
		array(
		  'description'	=> '',
		  'slug' 		=> 'events'
		)
	);
}
add_action( 'after_setup_theme', 'insert_category' );


// unregister all widgets
 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Text');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('WP_Nav_Menu_Widget');
     unregister_widget('Twenty_Eleven_Ephemera_Widget');
 }
 add_action('widgets_init', 'unregister_default_widgets', 11);


/**********************
GENERAL SCHEMA.ORG PAGE FUNCTION
**********************/

function html_tag_schema() {
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single()) {
        $type = "Article";
    }

    // Is author page
    elseif( is_author() || is_page_template ( 'single-people.php' )) {
        $type = 'ProfilePage';
    }

    // Contact form page
   elseif ( is_page_template( 'page-contact.php' ) )
    {
        $type = 'ContactPage';
    }

     // About page
   elseif ( is_page_template( 'page-about.php' ) )
    {
        $type = 'AboutPage';
    }

    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

/**********************
SET STATIC HOMEPAGE AND BLOG PAGE OPTIONS
**********************/

$homepage = get_page_by_title( 'Home' ); // name of home page here

//NB: get_page_by_title returns an object so $homepage->ID has to be used

if ( $homepage )
{
    update_option( 'page_on_front', $homepage->ID );
    update_option( 'show_on_front', 'page' );
}

$blog   = get_page_by_title( 'Blog' );

if ( $homepage )
{
update_option( 'page_for_posts', $blog->ID );
}

/**********************
FORCE PERMALINK STRUCTURE
**********************/

function smartest_set_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );// you can change /%postname%/ to any structure
}
add_action( 'init', 'smartest_set_permalinks' );

?>
