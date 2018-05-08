<?php
/**
 * bigwaha functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bigwaha
 */

if ( ! function_exists( 'bigwaha_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bigwaha_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bigwaha, use a find and replace
	 * to change 'bigwaha' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bigwaha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bigwaha' ),
	) );
/**
 * Custom Menus
 */

function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );


function register_mobile_menu() {
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_mobile_menu' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bigwaha_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bigwaha_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bigwaha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bigwaha_content_width', 640 );
}
add_action( 'after_setup_theme', 'bigwaha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bigwaha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bigwaha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bigwaha' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Left', 'bigwaha' ),
		'id' => 'footer-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Center', 'bigwaha' ),
		'id' => 'footer-center',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer – Right', 'bigwaha' ),
		'id' => 'footer-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'bigwaha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bigwaha_scripts() {
	// wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css'	 );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), 'v3.3.7', true );
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css'	 );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css'	 );
	wp_enqueue_style( 'bigwaha-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bigwaha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bigwaha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bigwaha_scripts' );

//Add Google Fonts
add_action('init', 'google_font_style'); 
  function google_font_style(){ 
    wp_register_style( 'GoogleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300i,400i,600,700,800,700i|Raleway:400,700,300,100,500,800,400i,100i,500i,700i,800i|Roboto:400,100,100i,300,300i,400i,900i,500,500i,700,700i,900|Slabo+27px|Lato:400,100,100i,300,300i,400i,700,700i,900,900i|Montserrat:400,700|Ubuntu:300,300i,400,400i,500,500i,700,700i|Oswald:300,400,700|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,700|Play:400,700'); 
    wp_enqueue_style( 'GoogleFonts' ); 
 }

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom post type
 */
require get_template_directory() . '/inc/custom-post-type.php';




add_filter('widget_text', 'do_shortcode');
//Opengraph for FB
function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
            $img_src_url = $img_src[0]; // this returns just the URL of the image
        } else {
            $img_src_url = get_stylesheet_directory_uri() . '/inc/images/logo.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src_url; ?>"/>
 
<?php
    } else { 

    $img_src_url = get_stylesheet_directory_uri() . '/inc/images/logo.jpg'; ?>

    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src_url; ?>"/>

        <?php return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

add_action( 'wp_enqueue_scripts', 'add_jquery' );
add_action( 'wp_footer', 'fixed_menu_onscroll' );
add_action( 'wp_footer', 'slide_out_mobile_nav' );

function add_jquery()
{
	wp_enqueue_script( 'jquery' );
}

function fixed_menu_onscroll()
{ 
?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$(window).bind('scroll', function() {
			if ($(window).scrollTop() > 100) {
				 $('header#masthead').addClass('fixed');
    } else {
        $('header#masthead').removeClass('fixed');
			}
		});
	});
	</script>
<?php

}




function slide_out_mobile_nav()
{
?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#menu-toggle').click(function() {
        if($('#menu-toggle').hasClass('closed')) {
            $('#mobile-nav').animate({left: "0"}, 400);
            $(this).removeClass('closed').addClass('open');
         }
        else if($('#menu-toggle').hasClass('open')) {
            $('#mobile-nav').animate({left: "-250px"}, 400);
            $(this).removeClass('open').addClass('closed');
          }  
    });
});
</script>
<?php
}
function page_title_bg()
{

// declare $post global if used outside of the loop
    global $post;

 if ( is_page_template( 'our-work.php' ) ) {
	 if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		$page_bg_image = the_post_thumbnail_url();
	}  
    
    else {
        // the fallback – our current active theme's default bg image
        $page_bg_image_url = get_theme_mod( 'bigwaha_page_header' );
    }

    // And below, spit out the <style> tag... ?>
    <style type="text/css" id="custom-background-css-override">
        .page-head-bg header.entry-header { background: url('<?php echo $page_bg_image_url; ?>') center center;
        background-size: cover;
    background-repeat: no-repeat; }
    </style>
<?php
}

 elseif ( !is_page_template( 'home-page.php' ) ) { 
    $page_bg_image = get_field('title_background_image');
    // check to see if the theme supports Featured Images, and one is set
    if ( !empty($page_bg_image)) {
            
        // specify desired image size in place of 'full'
        $page_bg_image_url = $page_bg_image['url']; // this returns just the URL of the image

    } else {
        // the fallback – our current active theme's default bg image
        $page_bg_image_url = get_theme_mod( 'bigwaha_page_header' );
    }

    // And below, spit out the <style> tag... ?>
    <style type="text/css" id="custom-background-css-override">
        .page-head-bg header.entry-header { background: url('<?php echo $page_bg_image_url; ?>') center center;
        background-size: cover;
    background-repeat: no-repeat; }
    </style>
<?php
}
}
add_action('wp_head', 'page_title_bg');


add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyBhmxk1WHZJTlTGaRd97zg0EtvgAomqOFg';
});