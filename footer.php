<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aya
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="media-container">
			<div id="footer-first-row">
				<div id="footer-delivery">
					<div class="footer-delivery-elements">
						<div>
							<p>Opțiuni de livrare</p>
							<img src="http://localhost/wp/wp-content/uploads/2018/11/optiuni-livrare.png"/>
						</div>
					</div>
					<div class="footer-delivery-elements">
						<div>
							<p>Opțiuni de plată</p>
							<img src="http://localhost/wp/wp-content/uploads/2018/11/optiuni-plata.png"/>
						</div>
					</div>
				</div>
				<div id="footer-map">
					<ul class="footer-map-list">
						<li><i class="material-icons">home</i><a href="javascript:void(0);">Pagina principală</a></li>
						<li><i class="material-icons">account_box</i><a href="javascript:void(0);">Contul meu</a></li>
						<li><i class="material-icons">contact_support</i><a href="javascript:void(0);">Contact</a></li>
					</ul>
					<ul class="footer-map-list">
						<li><i class="material-icons">question_answer</i><a href="javascript:void(0);">FAQ</a></li>
						<li><i class="material-icons">favorite</i><a href="javascript:void(0);">Articole favorite</a></li>
						<li><i class="material-icons">shopping_basket</i><a href="javascript:void(0);">Coș</a></li>
					</ul>
				</div>
			</div>
			<div id="footer-second-row">
				<ul id="footer-advantages">
					<li><i class="material-icons">security</i><p>Transferuri și plăți securizate prin conexiune SSL</p></li>
					<li><i class="material-icons">local_shipping</i><p>Livrare gratuită la comenzi peste 250 lei</p></li>
					<li><i class="material-icons">credit_card</i><p>Plată simplă prin card</p></li>
				</ul>
			</div>
    <?php
		echo '<nav id="rtp-primary-menu" role="navigation" class="rtp-nav-wrapper' . apply_filters( 'rtp_mobile_nav_support', ' rtp-mobile-nav' ) . '">';
//rtp_hook_begin_primary_menu(); // we better disable this hook as it intends for the header primary menu

/* Call wp_nav_menu() for Wordpress Navigaton with fallback wp_list_pages() if menu not set in admin panel */
if ( function_exists( 'wp_nav_menu' ) ) {
    wp_nav_menu( array( 'container' => '', 'menu_class' => 'menu rtp-nav-container clearfix', 'menu_id' => 'rtp-nav-menu', 'theme_location' => 'footer', 'depth' => apply_filters( 'rtp_nav_menu_depth', 4 ) ) );
} else {
    echo '<ul id="rtp-nav-menu" class="menu rtp-nav-container clearfix">';
    wp_list_pages( array( 'title_li' => '', 'sort_column' => 'menu_order', 'number' => '5', 'depth' => apply_filters( 'rtp_nav_menu_depth', 4 ) ) );
    echo '</ul>';
}

//rtp_hook_end_primary_menu(); // we better disable this hook as it intends for the header primary menu
echo '</nav>';
?>
	<div id="copyright">
		<p>© 2017 - 2018 S.C. AVANTGARDE NEW S.R.L, CUI: RO37233838, Reg. Com. J22/638/2017</p>
	</div>
</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
