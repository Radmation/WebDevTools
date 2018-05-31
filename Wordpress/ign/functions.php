<?php
require_once('template_parts/vendor/wp-bootstrap-navwalker.php');

//if (WP_LOCAL_DEV) {
//    echo "ya";
//    die();
//} else {
//    echo "no";
//    die();
//}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kb_theme_setup() {
    /**********************************************************************
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     **********************************************************************/
    load_theme_textdomain('ign', get_template_directory() . '/languages');

    // Adds RSS Feed links to the HTML <head>
    add_theme_support('automatic-feed-links');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'Primary Menu'),
        'secondary' => __('Footer Menu', 'Footer Menu')
    ));

    // Add support for custom post formats
    //add_theme_support('post-formats', array('aside', 'quote', 'image', 'link'));
}

add_action('after_setup_theme', 'kb_theme_setup'); // call function


/**************************************************************************************
 * Create page called 'Home' and set to static page if it doesn't exist
 **************************************************************************************/
if (get_page_by_title("Home") == null) {
    $post = array(
        "post_title" => "Home",
        "post_status" => "publish",
        "post_type" => "page",
        "menu_order" => "-100",
    );

    wp_insert_post($post);

    $home_page = get_page_by_title("Home");
    update_option("page_on_front", $home_page->ID);
    update_option("show_on_front", "page");
}

/**************************************************************************************
 * Custom Post Types
 * Post Type Templates: https://codex.wordpress.org/Post_Type_Templates archive-{post_type}.php single-{post_type}.php
 * Dashicons: https://developer.wordpress.org/resource/dashicons/#money
 ***************************************************************************************/
require_once('template_parts/custom_post_types.php');


/**************************************************************************************
 * Add File Here
 * js and css inclusions
 * Reference: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 **************************************************************************************/
function kb_enqueue_files() {
    if (is_page(1)) {
        /* enqueue specific page script files here */
    }
    /** CSS **/
    // reboot (normalize.css)
    wp_enqueue_style('reboot', get_template_directory_uri() . "/vendor/bootstrap/css/bootstrap-reboot.min.css");
    // bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/vendor/bootstrap/css/bootstrap.min.css");
    // unslider css
    wp_enqueue_style('unslider', get_template_directory_uri() . "/vendor/unslider/css/unslider.css");
    // main.css
    wp_enqueue_style('main', get_template_directory_uri() . "/css/main.css");

    /** JS **/
    // bootstrap js
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true);
    // unslider js
    wp_enqueue_script('unslider.min', get_template_directory_uri() . '/vendor/unslider/js/unslider-min.js', array('jquery'), '1.0.0', true);
    // font awesome js
    wp_enqueue_script('fontawesome', get_template_directory_uri() . '/vendor/fontawesome/js/fontawesome-all.min.js', array(), '1.0.0', true);
    // main js
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'kb_enqueue_files');

// just use jquery included with WP and put in head
function insert_jquery(){
    wp_enqueue_script('jquery');
}
add_filter('wp_head','insert_jquery');


/******************************************************
 * Register our sidebars and widgetized areas.
 ******************************************************/
function kb__widgets_init() {
    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
    ));

}
add_action('widgets_init', 'kb__widgets_init');


/* hide default editor from certain pages */
function kb_hide_editor() {
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    if (!isset($post_id)) {
        return;
    }
    // Hide the editor on the page titled 'Front Page'
    $homepage = get_the_title($post_id);
    if ($homepage == "Home") {
//        remove_post_type_support('page', 'editor');
    }

    // Hide the editor on a page with a specific page template
    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'template_contact_us.php') { // the filename of the page template
        //remove_post_type_support('page', 'editor');
    }
}

add_action('admin_init', 'kb_hide_editor');

/* Change the wordpress login screen logo to Client Logo */
function kb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
            padding-bottom: 30px;
            background-size: cover;
            width: 100%;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'kb_login_logo');


/***********************************************
 * CUSTOM PAGE SETTINGS - acf
 ***********************************************/
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

}


/***********************************************
 * Disable Theme Editor - Prevents changes to Source Code - Beanstalk @link http://guides.beanstalkapp.com/deployments/deploying-wordpress.html
 ***********************************************/
function remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);