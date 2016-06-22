<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	//Walker Class for Menus

	class themeslug_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
	// depth dependent classes
	$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 2); // because it counts the first submenu as 0
	$classes = array(
	    'sub-menu',
	    ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	    ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	    'sn-level-' . $display_depth
	    );
	$class_names = implode( ' ', $classes );

	// build html
	$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	function start_el( &$output, $item, $depth, $args ) {
	global $wp_query;
	$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 1);
		
	// depth dependent classes
	$depth_classes = array(

	    ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	    ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	    ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	    'sn-li-l' . $display_depth
	);
	$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

	// passed classes
	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

	// build html
	$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

	// link attributes
	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	$attributes .= ' class="sn-menu-link ' . ( $depth > 0 ? 'sn-sub-menu-link' : 'sn-main-menu-link' ) . '"';

	$item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
	    $args->before,
	    $attributes,
	    $args->link_before,
	    apply_filters( 'the_title', $item->title, $item->ID ),
	    $args->link_after,
	    $args->after
	);

	// build html
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	}

	
	// Emphasize beginning of page    
	function emph_function( $atts, $content = null ) {
	return '<p class="emph">'.do_shortcode($content).'</p>';
	}
	add_shortcode('emph', 'emph_function');

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head() & wp_footer()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		//Modernizr - header
		wp_register_script( 'modernizr', get_template_directory_uri().'/js/vendor/modernizr.min.js');
		wp_enqueue_script( 'modernizr' );

		//Use google jquery library instead of WordPress default - footer
    	wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
		wp_enqueue_script('jquery');

		//Both main.js and plugins.js minified - footer
		wp_register_script( 'plugins', get_template_directory_uri().'/js/production.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script( 'plugins' );


		//Style.css - header
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	



	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================
	
	Misc
	
	======================================================================================================================== */

	// Excerpt for Pages    
	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
	}
	//Remove Website field from comments & comment styling prompt

	function remove_comment_fields($fields) {
	    unset($fields['url']);
	    return $fields;
	}
	add_filter('comment_form_default_fields','remove_comment_fields');

	function remove_comment_styling_prompt($defaults) {
		$defaults['comment_notes_after'] = '';
		return $defaults;
	}
	add_filter('comment_form_defaults', 'remove_comment_styling_prompt');


	//Remove inline image sizing
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

	//Plugin Updates
	add_filter( 'auto_update_plugin', '__return_true' );

	//Advanced Custom Fields Options	
	if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	}

	//Products 
	add_action( 'init', 'codex_fish_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_fish_init() {
	$labels = array(
		'name'               => _x( 'Fishes', 'post type general name' ),
		'singular_name'      => _x( 'Fish', 'post type singular name' ),
		'menu_name'          => _x( 'Fishes', 'admin menu' ),
		'name_admin_bar'     => _x( 'Fish', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'fish' ),
		'add_new_item'       => __( 'Add New Fish' ),
		'new_item'           => __( 'New Fish' ),
		'edit_item'          => __( 'Edit Fish' ),
		'view_item'          => __( 'View Fish' ),
		'all_items'          => __( 'All Fishes' ),
		'search_items'       => __( 'Search Fishes' ),
		'parent_item_colon'  => __( 'Parent Fishes:' ),
		'not_found'          => __( 'No fishes found.' ),
		'not_found_in_trash' => __( 'No fishes found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'products' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'fish', $args );
}

//Dishes 
	add_action( 'init', 'codex_dish_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_dish_init() {
	$labels = array(
		'name'               => _x( 'Dishes', 'post type general name' ),
		'singular_name'      => _x( 'Dish', 'post type singular name' ),
		'menu_name'          => _x( 'Dishes', 'admin menu' ),
		'name_admin_bar'     => _x( 'Dish', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'dish' ),
		'add_new_item'       => __( 'Add New Dish' ),
		'new_item'           => __( 'New Dish' ),
		'edit_item'          => __( 'Edit Dish' ),
		'view_item'          => __( 'View Dish' ),
		'all_items'          => __( 'All Dishes' ),
		'search_items'       => __( 'Search Dishes' ),
		'parent_item_colon'  => __( 'Parent Dishes:' ),
		'not_found'          => __( 'No dishes found.' ),
		'not_found_in_trash' => __( 'No dishes found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'dishes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'dish', $args );
}