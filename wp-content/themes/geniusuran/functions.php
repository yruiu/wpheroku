<?php
/**
 * Geniusuran functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geniusuran
 */

require get_template_directory() . '/inc/redux-options.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'geniusuran_register_required_plugins' );

function geniusuran_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'geniusuran-core', // The plugin name.
			'slug'               => 'geniusuran-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/geniusuran-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),



		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'Gutenberg Template and Pattern Library & Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'geniusuran',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}

function geniusuran_paginates($query){
	$big = 999999999; // need an unlikely integer
	$paged='';
	if(is_singular()){
		$paged=get_query_var('page');
	} else{
		$paged=get_query_var('paged');
	}

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged ),
		'total'=>$query->max_num_pages,
		'prev_next'=>false,

	));
}

function geniusuran_equeue_scripts(){

    wp_enqueue_style('geniusuran-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css", array(),'1.1', 'all');
    wp_enqueue_style('owl-corouser', get_template_directory_uri().'/assets/js/lib/owlcarousel/assets/owl.carousel.min.css', array(),'1.1', 'all');
    wp_enqueue_style('tempusdominus-bootstrap', get_template_directory_uri().'/assets/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(),'1.1', 'all');
    wp_enqueue_style('geniusuran-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(),'1.1', 'all');
    wp_enqueue_style('geniusuran-style', get_template_directory_uri().'/assets/css/style.css', array(),'1.', 'all');
    wp_enqueue_style('geniusuran-general', get_template_directory_uri().'/assets/css/general.css', array(),'1.4', 'all');
    wp_enqueue_script('geniusuran-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('geniusuran-ajax', get_template_directory_uri().'/assets/js/ajax.js', array('jquery'),'1.0', true);
    wp_enqueue_script('bootstrap.bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script ('easing', get_template_directory_uri().'/assets/js/lib/easing/easing.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('waypoints', get_template_directory_uri().'/assets/js/lib/waypoints/waypoints.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('owl.carousel', get_template_directory_uri().'/assets/js/lib/owlcarousel/owlcarousel.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('moment', get_template_directory_uri().'/assets/js/lib/tempusdominus/moment.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('moment-timezone', get_template_directory_uri().'/assets/js/lib/tempusdominus/moment-timezone.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('tempusdominus-bootstrap', get_template_directory_uri().'/assets/js/lib/tempusdominus/tempusdominus-bootstrap-4.min.js', array('jquery'),'1.0', true);
    wp_enqueue_script ('geniusuran-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'),'1.0', true);
    wp_enqueue_style('gu-fonts', gu_fonts_url(), array(), '1.0');
//    wp_localize_script('geniusuran-ajax', 'geniusuran_ajax_script', array(
//		'ajaxurl'=>admin_url('admin-ajax.php'),
//		'nonce'=>wp_create_nonce('ajax-nonce'),
//		'string_box'=>esc_html__('Hello', 'geniusuran'),
//		'string_new'=>esc_html__('Hello world', 'geniusuran'),
//
//	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
/*
 * geniusuran name of theme
 * */
add_action('wp_enqueue_scripts', 'geniusuran_equeue_scripts');
function gu_fonts_url (){
	$fonts_url='';
	$familles=array();
	$familles[]='Oswald:wght@400;500;600;700';
	$familles[]='Rubik';

	$query_args=array(
		'family'=>urldecode(implode("|", $familles)),
	);
	$fonts_url=add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	return esc_url_raw($fonts_url);
}
function geniusuran_ajax_example(){
    if(!wp_verify_nonce($_REQUEST['nonce'],'ajax-nonce')){
        die;
    }

    if(isset($_REQUEST['string_one'])){
        echo $_REQUEST['string_one'];
    }
    echo "<br>";
    if(isset($_REQUEST['string_two'])){
        echo $_REQUEST['string_two'];
    }
    $cars=new WP_Query(array('post_type'=>'car', 'posts_per_page'=>-1));
    if($cars->have_posts()): while($cars->have_posts()): $cars->the_post();
         get_template_part('parts/content', 'car' );
    endwhile; endif;
    die;
}
add_action('wp_ajax_geniusuran_ajax_example', 'geniusuran_ajax_example');
add_action('wp_ajax_nopriv_geniusuran_ajax_example', 'geniusuran_ajax_example');
function geniusuran_theme_init(){
    register_nav_menus(array(
        'header_nav' => 'Header_Navigation',
        'footer_nav' => 'Footer_Navigation',
    ));
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	load_theme_textdomain('geniusuran', get_template_directory().'/lang');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size('car-cover', 240, 188);
	update_option('thumbnail_size_w', 170);
	update_option('thumbnail_size_h', 170);
	update_option('thumbnail_crop', 1);
	add_theme_support('post-formats',
		array(
			'video',
			'quote',
			'image',
			'gallery'
		));
	add_post_type_support('car', 'post-formats');
}

add_action('after_setup_theme','geniusuran_theme_init', 1);
/* geniusuran name of theme*/




function geniusuran_rewrite_rukes(){
	flush_rewrite_rules();

}
add_action('after_switch_theme','geniusuran_rewrite_rukes');
function geniusuran_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'geniusuran' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'geniusuran' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Car Pages Sidebar', 'geniusuran' ),
			'id'            => 'carsidebar',
			'description'   => esc_html__( 'Appear as a Sidebar on Car Pages', 'geniusuran' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'geniusuran_widgets_init' );

function geniusuran_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geniusuran_content_width', 640 );
}
add_action( 'after_setup_theme', 'geniusuran_content_width', 0 );
function geniusuran_custom_comments($comment, $args, $depth){
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <div class="comment-author vcard"><?php
    if ( $args['avatar_size'] != 0 ) {
        echo get_avatar( $comment, $args['avatar_size'] );
    }
    printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>

    <div class="reply"><?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        ); ?>
    </div>
    </div><?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>
    <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
            /* translators: 1: date, 2: time */
            printf(
                __('%1$s at %2$s'),
                get_comment_date(),
                get_comment_time()
            ); ?>
        </a><?php
        edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
    </div>

    <?php comment_text(); ?>

    <?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}


function gu_first_filter($name){
    $name='My name is: '. $name;
    return $name;
}

add_filter('gu_first_filter', 'gu_first_filter');


remove_filter('gu_first_filter', 'gu_first_filter');


function gu_add_class_on_li($clases,$item,$args){
    if(isset($args->add_li_class)){
        $clases[]=$args->add_li_class;
    }
    return $clases;

}
add_filter('nav_menu_css_class', 'gu_add_class_on_li', 1, 3);