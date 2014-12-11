<?php
/**
 * mat225-thompson functions and definitions
 *
 * @package mat225-thompson
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'mat225_thompson_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mat225_thompson_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mat225-thompson, use a find and replace
	 * to change 'mat225-thompson' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mat225-thompson', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mat225-thompson' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mat225_thompson_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mat225_thompson_setup
add_action( 'after_setup_theme', 'mat225_thompson_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mat225_thompson_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mat225-thompson' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mat225_thompson_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mat225_thompson_scripts() {
	wp_enqueue_style( 'mat225-thompson-fonts', '//fonts.googleapis.com/css?family=Oswald:400,300|Open+Sans:400,600,700');

	wp_enqueue_style( 'mat225-thompson-style', get_stylesheet_uri());

	wp_enqueue_style( 'mat225-thompson-style-special', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style ('mat225-thompson-style-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

	wp_enqueue_script( 'mat225-thompson-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'mat225-thompson-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'mat225-thompson-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script ( 'mat225-thompson-theme-js', get_template_directory_uri() . '/js/theme.js', '', '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mat225_thompson_scripts' );


add_action( 'wp_enqueue_scripts', 'superfish_libs' );
function superfish_libs()
{
    // Register each script, setting appropriate dependencies
    wp_register_script('hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', '', '', true);
    wp_register_script('bgiframe',    get_template_directory_uri() . '/js/jquery.bgiframe.min.js');
    wp_register_script('superfish',   get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'hoverintent', 'bgiframe' ), '', true);
    wp_register_script('supersubs',   get_template_directory_uri() . '/js/supersubs.js', array( 'superfish' ),'', true);
 
    // Enqueue supersubs, we don't need to enqueue any others in this case, as the dependencies take care of it for us
    wp_enqueue_script('supersubs');
 
    // Register each style, setting appropriate dependencies
    wp_register_style('superfishbase',   get_template_directory_uri() . '/css/superfish.css');
    wp_register_style('superfishvert',   get_template_directory_uri() . '/css/superfish-vertical.css', array( 'superfishbase' ));
    wp_register_style('superfishnavbar', get_template_directory_uri() . '/css/superfish-navbar.css', array( 'superfishvert' ));
 
    // Enqueue superfishnavbar, we don't need to enqueue any others in this case either, as the dependencies take care of it
    wp_enqueue_style('superfishnavbar');
}

function ilink($img) {
	echo get_template_directory_uri() . '/img/' . $img;
}

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'portfolio' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'portfolio'),
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
      'capability_type' => 'post',
      'menu_position' => 20,
      'register_meta_box_tt' => 'add_url_metaboxes'
    )
  );
}

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

	if ( ( is_home() && $query->is_main_query() ) || is_feed() )
	$query->set( 'post_type', array( 'post', 'portfolio' ) );

return $query;
}

function add_portfolio_metabox() {
	add_meta_box('portfolio-metabox', 'Site URL', 'render_portfolio_metabox', 'portfolio', 'side', 'low');
}
add_action('add_meta_boxes', 'add_portfolio_metabox');

function render_portfolio_metabox($post) {
?>
<form method="post">
<input type="hidden" name="portfolio-meta">
<input type="text" name="port-link" value="<?php echo get_post_meta($post->ID, 'port-link', true); ?>" col="20">
</form>
<?php
}

function save_metabox_info($id) {
	if (isset($_POST['portfolio-meta'])) {
		if (isset($_POST['port-link'])) {
			update_post_meta($id, 'port-link', $_POST['port-link']);
		}
	}
}
add_action('save_post', 'save_metabox_info');


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
