<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
		<?php endforeach; ?>
	</div>
	<script>
		var windowWidth = $(window).width();
		if (windowWidth <= 900) {
			var panels = $(".woocommerce-Tabs-panel");
	
			for (var i = 0; i < panels.length; i++) {
				var name = $(panels[i]).attr("id");
				name = name.slice(4).replace("_", " ");
				var title = document.createElement("div");
				var icon = document.createElement("i");
				$(icon).addClass("material-icons");
				$(icon).append("arrow_drop_down");
				$(title).append(icon);
				$(title).addClass("panel-title");
				$(title).append(name);
				var children = $(panels[i]).children();
				for (var j = 0; j < children.length; j++) {
					if ($(children[j]).hasClass("panel-title") == false) {
						$(children[j]).addClass("closed-tab");
					}
				}
				panels[i].append(title);
			}
	
			$(".panel-title").on("click", function () {
				var tabToOpen = $(this).prev();
				if (tabToOpen.hasClass("closed-tab")) {
					tabToOpen.removeClass("closed-tab");
					tabToOpen.addClass("open-tab");
				}
				else {
					tabToOpen.removeClass("open-tab");
					tabToOpen.addClass("closed-tab");
				}
			});
		}
	</script>

<?php endif; ?>
