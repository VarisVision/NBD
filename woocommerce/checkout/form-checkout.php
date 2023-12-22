<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<div class="nbd-checkout__order-total">
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

		<div class="nbd-checkout__price">
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
				<div class="nbd-checkout__shipping">
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
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

