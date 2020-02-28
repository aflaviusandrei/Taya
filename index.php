<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aya
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="home-special-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'homepage-menu' ) ); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
		function generateHomeBanners () {
    		var anchors = $("#home-special-menu ul li a");
    		for (var i = 0; i < anchors.length; i++) {
        		var bannerLink = $(anchors[i]).text();
        		var homeBanner = document.createElement("img");
        		$(homeBanner).attr("src", bannerLink);
        		$(anchors[i]).append(homeBanner);
        		let isTextNode = (_, el) => el.nodeType === Node.TEXT_NODE;
        		$(anchors[i]).contents().filter(isTextNode).remove();
        		console.log(anchors[i].children);
    		}
		}
		generateHomeBanners();
	</script>

<?php

get_footer();
