<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="nbdc-checkout__order-review shop_table woocommerce-checkout-review-order-table">
	<h3>Order Review</h3>
	<ul class="nbdc-checkout__cart-items">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );
		
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$image_id = $_product->get_image_id();
			$mobile_image_url = wp_get_attachment_image_url( $image_id, array(100, 100) );
			$desktop_image_url = wp_get_attachment_image_url( $image_id, array(150, 150) );
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="product-name">
						<?php echo '<img class="nbd-mobile" src="'. $mobile_image_url .'" alt="'. $image_alt .'" />'?>
						<?php echo '<img class="nbd-desktop" src="'. $desktop_image_url .'" alt="'. $image_alt .'" />'?>
						<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
						<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <span class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</ul>

	<div class="nbdc-checkout__order-total">
		<div class="checkout_coupon woocommerce-form-coupon" method="post">

			<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>

			<p class="form-row form-row-first">
				<label for="coupon_code" class=""><?php esc_html_e( 'Coupon Code', 'woocommerce' ); ?></label>
				<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( '', 'woocommerce' ); ?>" id="coupon_code" value="" />
			</p>

			<p class="form-row form-row-last">
				<button  class="checkout_coupon_btn button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
			</p>

			<div class="clear"></div>
		</div>

		<div class="nbdc-checkout__price">
			<div class="cart-subtotal">
				<p><?php esc_html_e( 'Items Total', 'woocommerce' ); ?></p>
				<p><?php wc_cart_totals_subtotal_html(); ?></p>
			</div>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<p><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
					<p><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
				</div>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
				<div class="nbdc-checkout__shipping">
					<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
				</div>
			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<div class="fee">
					<p><?php echo esc_html( $fee->name ); ?></p>
					<p><?php wc_cart_totals_fee_html( $fee ); ?></p>
				</div>
			<?php endforeach; ?>

			<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
				<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
						<div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							<p><?php echo esc_html( $tax->label ); ?></p>
							<p><?php echo wp_kses_post( $tax->formatted_amount ); ?></p>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="tax-total">
						<p><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></p>
						<p><?php wc_cart_totals_taxes_total_html(); ?></p>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<div class="order-total">
				<p><?php esc_html_e( 'Total', 'woocommerce' ); ?></p>
				<p><?php wc_cart_totals_order_total_html(); ?></p>
			</div>

			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</div>

	</div>
</div>
