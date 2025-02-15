<?php


	/*-------------------------------------------
	   	Theme Setup
	-------------------------------------------*/

	// based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/


	function techy_setup() {

		load_theme_textdomain( 'techy', get_template_directory() . '/languages' );

		register_nav_menu( 'primary', __( 'Primary Navigation', 'techy' ) );

		register_nav_menu( 'about-sidebar', __( 'About Sidebar Navigation', 'techy' ) );

		register_nav_menu( 'pre-footer', __( 'Pre-Footer Navigation', 'techy' ) );


		/* Additional Image Sizes */


		// Slideshow (full size is 1200 x 400)

		add_image_size( "slide_large", 900, 400, true);

		add_image_size( "slide_medium", 600, 400, true );

	}

	add_action( 'after_setup_theme', 'techy_setup' );


	/*-------------------------------------------
	   	Scripts & Styles
	-------------------------------------------*/


	function techy_scripts_styles() {

		global $wp_styles;

		// Load Comments

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

			wp_enqueue_script( 'comment-reply' );

		// Load Stylesheets

		// wp_enqueue_style( 'techy-reset', get_template_directory_uri() . '/reset.css' );
		// wp_enqueue_style( 'techy-style', get_stylesheet_uri() );

		// Load IE Stylesheet.

		// wp_enqueue_style( 'techy-ie', get_template_directory_uri() . '/css/ie.css', array( 'techy-style' ), '20130213' );
		// $wp_styles->add_data( 'techy-ie', 'conditional', 'lt IE 9' );

		// Modernizr

		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.

		// wp_enqueue_script( 'techy-modernizr', get_template_directory_uri() . '/a/js/modernizr-2.6.2.dev.js' );

	}

	add_action( 'wp_enqueue_scripts', 'techy_scripts_styles' );


	/*-------------------------------------------
	   	WP Title
	-------------------------------------------*/


	function techy_wp_title( $title, $sep ) {

		global $paged, $page;

		if ( is_feed() )

			return $title;

		// Add the site name.

		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.

		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )

			$title = "$title $sep $site_description";

		// Add a page number if necessary.

		if ( $paged >= 2 || $page >= 2 )

			$title = "$title $sep " . sprintf( __( 'Page %s', 'techy' ), max( $paged, $page ) );

		// FIX

		// if (function_exists('is_tag') && is_tag()) {

			// single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }

		// elseif (is_archive()) {

			// wp_title(''); echo ' Archive - '; }

		// elseif (is_search()) {

			// echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }

		// elseif (!(is_404()) && (is_single()) || (is_page())) {

			// wp_title(''); echo ' - '; }

		// elseif (is_404()) {

			// echo 'Not Found - '; }

		// if (is_home()) {

			// bloginfo('name'); echo ' - '; bloginfo('description'); }

		// else {

			// bloginfo('name'); }

		// if ($paged>1) {

			// echo ' - page '. $paged; }

		return $title;

	}

	add_filter( 'wp_title', 'techy_wp_title', 10, 2 );


	/*-------------------------------------------
	   	Add Page ID to <body>
	-------------------------------------------*/

	// An example would be for the home page: <body id="home" class="...">


	function get_body_id( $id = '' ) {

		global $wp_query;

		// Fallbacks

		if ( is_front_page() )  $id = 'home';
		if ( is_home() )        $id = 'home';
		if ( is_search() )      $id = 'search';

		// If it's an Archive Page

		if ( is_archive() ) {

			if ( is_author() ) {

				$author = $wp_query->get_queried_object();
				$id = 'archive-author-' . sanitize_html_class( $author->user_nicename , $author->ID );

			} elseif ( is_category() ) {

				$cat = $wp_query->get_queried_object();
				$id = 'archive-category-' . sanitize_html_class( $cat->slug, $cat->cat_ID );

			} elseif ( is_date() ) {

				if ( is_day() ) {

					$date = get_the_time('F jS Y');
					$id = 'archive-day-' . str_replace(' ', '-', strtolower($date) );

				} elseif ( is_month() ) {

					$date = get_the_time('F Y');
					$id = 'date-' . str_replace(' ', '-', strtolower($date) );

				} elseif ( is_year() ) {

					$date = get_the_time('Y');
					$id = 'date-' . strtolower($date);

				} else {

					$id = 'archive-date';

				}

			} elseif ( is_tag() ) {

				$tags = $wp_query->get_queried_object();
				$id = 'archive-tag-' . sanitize_html_class( $tags->slug, $tags->term_id );

			} else {

				$id = 'archive';

			}

		}

		// If it's a Page

		if ( is_page() ) {

			$id = $wp_query->queried_object->post_name;

			if ('' == $id ) {

				$id = 'page';

			}

		}

		// If it's the Blog landing Page

		if ( ! is_page()) {

			$id = 'blog';

		}

		// If it's a Single Post

		if ( is_single() ) {

			if ( is_attachment() ) {

				$id = 'attachment';

			} else {

				$id = 'single-post';

			}

		}

		// If it's an Error Page

		if ( is_404() ) $id = 'error';

		// If $id still doesn't have a value, attempt to assign it the Page's name

		if ('' == $id ) {

			$id = $wp_query->queried_object->post_name;

		}

		$id = preg_replace("#\s+#", " ", $id);
		$id = str_replace(' ', '-', strtolower($id) );

		// Let other plugins modify the function

		return apply_filters( 'body_id', $id );

	};

	// Print id on body elements

	function body_id( $id = '' ) {

		if ( '' == $id ) {

			$id = get_body_id();

		}

		$id = preg_replace("#\s+#", " ", $id);
		$id = str_replace(' ', '-', strtolower($id) );

		echo ( '' != $id ) ? 'id="'.$id. '"': '' ;

	};


	// OLD STUFF BELOW


	/*-------------------------------------------
	   	Load jQuery
	-------------------------------------------*/


	if ( !function_exists( 'core_mods' ) ) {

		function core_mods() {

			if ( !is_admin() ) {

				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );

			}

		}

		add_action( 'wp_enqueue_scripts', 'core_mods' );

	}


	/*-------------------------------------------
	   	Clean up the <head>
	-------------------------------------------*/


	function removeHeadLinks() {

		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');

	}

	add_action('init', 'removeHeadLinks');


	/*-------------------------------------------
	   	Custom Menu
	-------------------------------------------*/


	register_nav_menu( 'primary', __( 'Navigation Menu', 'techy' ) );


	/*-------------------------------------------
	   	Widgets
	-------------------------------------------*/


	function techy_widgets_init() {

		register_sidebar( array(

			'name'          => __( 'Sidebar Widgets', 'techy' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',

		) );

	}

	add_action( 'widgets_init', 'techy_widgets_init' );


	/*-------------------------------------------
	   	Navigation
	-------------------------------------------*/


	function post_navigation() {

		echo '<div class="navigation">';

			echo '<div class="next-posts">'.next_posts_link('&laquo; Older Entries').'</div>';

			echo '<div class="prev-posts">'.previous_posts_link('Newer Entries &raquo;').'</div>';

		echo '</div>';

	}


	/*-------------------------------------------
	   	Posted On
	-------------------------------------------*/


	function posted_on() {

		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),

			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )

		);

	}


	/*-------------------------------------------
	   	Options
	-------------------------------------------*/

	add_filter( 'acf/options_page/settings', 'my_options_page_settings');

	function my_options_page_settings( $options ) {

		$options["title"] = __("Globals");

		$options["pages"] = array(

			__("Contact Info"),
			__("Social Media"),
			__("Google Tools"),
			__("Site Meta")

		);

		return $options;

	}


?>