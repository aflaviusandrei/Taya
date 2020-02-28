<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aya
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- All sorts of pretty STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- SCRIPTS (these should be in the footer oops) -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aya' ); ?></a>

	<header id="masthead" class="site-header flex-container direction-column">
		<div class="site-branding flex media-container">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<div id="site-title-container">
					<i class="material-icons nav-burger">menu</i>
					<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
				</div>
			<?php else : ?>
				<div id="site-title-container" class="header-elements">
					<i class="material-icons nav-burger">menu</i>
					<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
				</div>
			<?php
			endif;
			?>
			<div id="search-form-container" class="header-elements  flex-container">
				<form id="search-form" class="flex-container" role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div id="header-search-container">
						<div class="search-title">
							<h1>Caută</h1>
							<i class="material-icons">close</i>
						</div>
						<div class="input-button">
							<div class="searchinput header-elements" id="header-search-input">
								<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							</div>
							<div class="searchbutton header-elements">
								<button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="material-icons">search</i></button>
	<input type="hidden" name="post_type" value="product" />
							</div>
						</div>
					</div>
				</form>
				<div id="wishlist-cart-header" class="flex-container">
					<div id="wishlist-cart-icons" class="flex-container">
						<a href="http://localhost/wp/faq/" class="wishlist-cart-elements dont-display-icons" id="wishlist-header-button"><i class="material-icons">contact_support</i><p>AJUTOR</p></a>
						<span></span>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>" class="wishlist-cart-elements dont-display-icons" id="wishlist-header-button"><i class="material-icons">account_circle</i><p>CONTUL MEU</p></a>
						<span></span>
						<a href="http://localhost/wp/wishlist" class="wishlist-cart-elements" id="wishlist-header-button"><i class="material-icons" style="color:#e54131;">favorite</i><p>FAVORITE</p></a>
						<span></span>
						<a href="javascript:void(0);" class="wishlist-cart-elements cart-header-button"><i class="material-icons">shopping_basket</i><p>COS</p></a>
					</div>
				</div>
			</div>

		</div><!-- .site-branding -->
		<div id="navigation" class="nav">
			<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
			<div id="sec-nav-container" class="media-container">
				<div id="icophone-mobile">
					<a href="tel:0756 987 987">0756 987 987</a>
					<i class="material-icons nav-burger" id="inside-burger">menu</i>
				</div>

<nav class="main-navigation ">
	<?php ?>
		<?php  
		wp_nav_menu(array(
			'menu'            => 'main',
			'theme_location'  => 'primary',
			'container'       => false,
			'depth'           => 4
		));
	?>
</nav>
					<form id="searchform" class="flex-container" role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="searchinput header-elements search-none" id="navigation-search-input">
							<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
						</div>
						<div class="searchbutton search-none header-elements" id="search-button-nav">
							<button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="material-icons">search</i></button>
	<input type="hidden" name="post_type" value="product" />
						</div>
					</form>
				<div id="nav-phone-container">
					<a href="tel:0756 987 987">0756 987 987</a>
				</div>
			</div>
			<div class="scrolled-icons">
				<a href="http://localhost/wp/my-account/" class="wishlist-cart-elements dont-display-icons" id="wishlist-header-button"><i class="material-icons">account_circle</i></a>
				<a href="http://localhost/wp/wishlist" class="wishlist-cart-elements" id="wishlist-header-button"><i class="material-icons">favorite</i></a>
				<a href="javascript:void(0);" class="wishlist-cart-elements cart-header-button"><i class="material-icons">shopping_basket</i></a>
			</div>
		</div>
		<div id="slide-cart-container">
			<div id="close-cart-container" class="cart-header-button">
				<i class="material-icons">close</i>
			</div>
			<div id="slide-cart-inner">
				<div class="mini-cart-inner">
<?php woocommerce_mini_cart(); ?>
</div>
    		</div>
		</div>
		<b class="mask"></b>
	</header><!-- #masthead -->

	<div id="content" class="site-content media-container">