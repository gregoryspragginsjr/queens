<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
$static_timber_dirs = array(
	'src/twig/layouts',
	'src/twig/pages',
	'src/twig/components',
);

$theme_base = get_template_directory() . '/';

$component_dirs = array_map(
	function ( $str ) use ( &$theme_base ) {
		return str_replace( $theme_base, '', $str );
	},
	array_filter( glob( $theme_base . 'src/twig/components/*' ), 'is_dir' )
);

Timber::$dirname = array_merge( $static_timber_dirs, $component_dirs );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'acf/init', array( $this, 'my_acf_init') );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	public function my_acf_init() {
        
		// check function exists
		if( function_exists('acf_register_block') ) {
		
			// register the accordion block
			acf_register_block(array(
				'name'				=> 'accordion',
				'title'				=> __('Accordion'),
				'description'		=> __('A custom accordion block with toggleable panels.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'			=> array( 'accordion', 'panels' ),
			));

			// register the accordion section block
			acf_register_block(array(
				'name'				=> 'accordion-section',
				'title'				=> __('Accordion Section'),
				'description'		=> __('Full-bleed section dedicated to accordion display with accomodating context.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'			=> array( 'accordion', 'layout', 'section', 'panels' ),
			));

			// register the page header block
			acf_register_block(array(
				'name'				=> 'page-header',
				'title'				=> __('Page Header'),
				'description'		=> __('Hero for first level landing pages.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'			=> array( 'hero', 'page', 'header' ),
			));

			// register the subheading block
			acf_register_block(array(
				'name'				=> 'subheading',
				'title'				=> __('Subheading'),
				'description'		=> __('Micro block for adding semantic subheadings in Gutenberg.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'formatting',
				'icon'				=> 'dashicons-editor-textcolor',
				'keywords'			=> array( 'subheading', 'heading' ),
			));

			// register the media context block
			acf_register_block(array(
				'name'				=> 'media-context',
				'title'				=> __('Media Context'),
				'description'		=> __('Traditional side-by-side layout for any style of media with cooresponding context.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'media', 'image', 'context', 'layout' ),
			));

			// register the full bleed media context block
			acf_register_block(array(
				'name'				=> 'full-bleed-media-context',
				'title'				=> __('Full Bleed Media Context'),
				'description'		=> __('Full bleed variation of the media context component featuring gradient text.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'media', 'image', 'context', 'layout', 'full', 'bleed', 'gradient' ),
			));

			// register the context section block
			acf_register_block(array(
				'name'				=> 'context-section',
				'title'				=> __('Context Section'),
				'description'		=> __('Section dedicated to full bleed context featuring varying backgrounds and options.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'context', 'section', 'layout', 'squiggle' ),
			));

			// register the video block
			acf_register_block(array(
				'name'				=> 'video',
				'title'				=> __('Video'),
				'description'		=> __('Full-width video component for standalone instances.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'media', 'video' ),
			));

			// register the article grid
			acf_register_block(array(
				'name'				=> 'article-grid',
				'title'				=> __('Article Grid'),
				'description'		=> __('Layout dedicated to article display. Features several column layout styles and supports varying image sizes.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'article', 'grid', 'image' ),
			));

			// register the context callout
			acf_register_block(array(
				'name'				=> 'context-callout',
				'title'				=> __('Context Callout'),
				'description'		=> __('Bordered, inset, interstitial styled component featuring a thumbnail.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'context', 'callout', 'image', 'border' ),
			));

			// register the miscellaneous section
			acf_register_block(array(
				'name'				=> 'miscellaneous-section',
				'title'				=> __('Miscellaneous Section'),
				'description'		=> __('Section featuring varying subcomponents for multiple use cases.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'context', 'miscellaneous', 'image', 'article', 'list' ),
			));

			// register the staggered card slider
			acf_register_block(array(
				'name'				=> 'staggered-card-slider',
				'title'				=> __('Staggered Card Slider'),
				'description'		=> __('Section dedicated to horizontally scrolling articles, currated in varying sizes and margins.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'staggered', 'card', 'image', 'article', 'carousel', 'slider' ),
			));

			// register the staggered media context grid
			acf_register_block(array(
				'name'				=> 'staggered-media-context-grid',
				'title'				=> __('Staggered Media Context Grid'),
				'description'		=> __('Grid featuring a staggered, condensed layout of media context components.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'staggered', 'image', 'media', 'context', 'grid' ),
			));

			// register the hero
			acf_register_block(array(
				'name'				=> 'hero',
				'title'				=> __('Hero'),
				'description'		=> __('Homepage exclusive hero with dynamic text and HTML5 video loop.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'hero', 'loop', 'media', 'video', 'heading' ),
			));

			// register the display media context
			acf_register_block(array(
				'name'				=> 'display-media-context',
				'title'				=> __('Display Media Context'),
				'description'		=> __('Media context variant featuring larger, treated images.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'media', 'context', 'display', 'image' ),
			));

			// register the display media context
			acf_register_block(array(
				'name'				=> 'stats',
				'title'				=> __('Stats'),
				'description'		=> __('Section dedicated to displaying large svgs.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'media', 'graphics', 'svgs', 'grid' ),
			));

			// register the logo grid
			acf_register_block(array(
				'name'				=> 'logo-grid',
				'title'				=> __('Logo Grid'),
				'description'		=> __('Section dedicated to displaying medium sized logos.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'layout',
				'icon'				=> 'block-default',
				'keywords'        => array( 'layout', 'logo', 'graphics', 'svgs', 'grid' ),
			));
		}
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['post'] = Timber::get_post();
		global $wp;
	
		if ( ! is_404() ) {
			$crumbs = get_post_ancestors( $context['post']->ID );

			if ( $crumbs ) {
				$breadcrumbs_menu = array();

				foreach ( $crumbs as $ancestor ) {
					array_push(
						$breadcrumbs_menu,
						array(
							'id'    => $ancestor,
							'title' => get_the_title( $ancestor ),
							'url'   => get_permalink( $ancestor ),
						)
					);
				}
			}

			if ( isset( $breadcrumbs_menu ) ) {
				$context['breadcrumbs_menu'] = array_reverse( $breadcrumbs_menu );
			}
		}

		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		if (is_multisite()) { switch_to_blog(1); }
		$context['main_menu']      = new Timber\Menu( 'Main Menu' );
		$context['utility_menu']   = new Timber\Menu( 'Utility Menu' );
		$context['footer_info_menu']   = new Timber\Menu( 'Footer Info Menu' );
		$context['policies_menu']   = new Timber\Menu( 'Policies Menu' );
		$context['global_address'] = get_field( 'address', 'options' );
		$context['global_phone']   = get_field( 'phone', 'options' );
		$context['global_banner']   = get_field( 'banner', 'options' );
		$context['global_alert']   = get_field( 'alert', 'options' );
		if (is_multisite()) {  restore_current_blog(); }
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );

		add_image_size( 'Square', 900, 900, true );
		add_image_size( 'Square_mobile', 600, 600, true );
		add_image_size( 'Rectangle', 990, 705, true );
		add_image_size( 'Rectangle_mobile', 660, 470, true );
		add_image_size( 'Hero', 2400, 1320, true );
		add_image_size( 'Hero_mobile', 800, 440, true );
		add_image_size( 'Portrait', 630, 900, true );
		add_image_size( 'Portrait_mobile', 420, 600, true );
		add_image_size( 'Portrait2_mobile', 320, 400, true );
		add_image_size( 'Collage_rectangle', 764, 548, true );
		add_image_size( 'Collage_portrait', 490, 690, true );

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => 'Global Settings',
					'menu_title' => 'Global Settings',
					'menu_slug'  => 'global-settings',
					'capability' => 'edit_posts',
					'redirect'   => false,
				)
			);
		}
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
  wp_enqueue_style( 'hvh', get_template_directory_uri() . '/dist/styles/scripts.css', array(), date("H:i:s"));
  wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/scripts.js', array(), date("H:i:s"), true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function my_acf_block_render_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::context();

	// Store block values.
	$context['block'] = $block;

	// Store field values.
	$context['fields'] = get_fields();

	// Store $is_preview value.
	$context['is_preview'] = $is_preview;

	$context['block_name'] = substr($block['name'], 4);

	// Render the block.
	Timber::render( 'src/twig/components/'. $context['block_name'] . '/' . $context['block_name'] . '.twig', $context['fields'] );
}


/**
 * Customize The Events Calendar breakpoints to match our design
 */
add_filter( 'tribe_events_views_v2_view_breakpoints', function( $breakpoints ) {
  $breakpoints = [
		'xsmall' => 480,
    'medium' => 640,
    'full'   => 1200,
  ];
 
  return $breakpoints;
} );


/**
 * Customize The Events Calendar block editor template
 */
add_filter( 'tribe_events_editor_default_template', function( $template ) {
	$template = [
		[ 'tribe/event-datetime' ],
    [ 'core/paragraph', [
      'placeholder' => __( 'Add Description...', 'the-events-calendar' ),
    ], ],
		[ 'tribe/event-price' ],
		[ 'tribe/event-links' ],
    [ 'tribe/event-venue' ],
		[ 'tribe/event-website' ],
  ];
  return $template;
}, 11, 1 );
