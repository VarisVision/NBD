<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="nbdc-mini-cart woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
			//VarisVision changes start
			$thumbnail_size = array(100, 100);
			$image_id = $_product->get_image_id();
			$image_url = wp_get_attachment_image_url( $image_id, $thumbnail_size );
			$thumbnail = '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $_product->get_name() ) . '" loading="lazy" />';
			$product_name_and_size = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
			$product_parts = explode(' - ', $product_name_and_size);
			$product_name = trim($product_parts[0]);
			$variation = isset($product_parts[1]) ? trim($product_parts[1]) : '';
			$variation_id = $_product->is_type('variation') ? $_product->get_id() : '';

			$product_price     = $_product->get_price();
			if ( $_product->is_type( 'variation' ) ) {
				$parent_id = $_product->get_parent_id();
				$product_permalink = get_permalink( $parent_id );
			} else {
				$product_permalink = $_product->get_permalink();
			}
			
			$product_permalink = wp_parse_url( $product_permalink, PHP_URL_PATH );
			
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $product_permalink, $cart_item, $cart_item_key );

			?>
			<li class="nbdc-mini-cart__item woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
				<?php if ( empty( $product_permalink ) ) : ?>
					<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<a class="nbdc-mini-cart__img" href="<?php echo esc_url( $product_permalink ); ?>">
						<?php echo $thumbnail // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
					<div class="nbdc-mini-cart__product-details">
						<div class="nbdc-mini-cart__product-details--header">
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo wp_kses_post( $product_name ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" title="Remove">
											<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 -960 960 960">
												<use href="#bin"></use>
											</svg>
										</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										/* translators: %s is the product name */
										esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
										esc_attr( $product_id ),
										esc_attr( $cart_item_key ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</div>

						<p class="nbdc-mini-cart__product-details--size">
							<?php echo "Size: " . $variation; ?>
						</p>

						<div class="nbdc-mini-cart__product-details--footer">
							<?php
								echo apply_filters(
									'woocommerce_widget_cart_item_quantity',
									'<div class="quantity">
										<button title="Take less" class="quantity-minus disabled" data-cart-item-key="' . esc_attr($cart_item_key) . '">
											<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 -960 960 960">
												<use href="#minus"></use>
											</svg>
										</button>
										<span class="quantity-input">' . esc_html($cart_item['quantity']) . '</span>
										<button title="Add more" class="quantity-plus" data-cart-item-key="' . esc_attr($cart_item_key) . '">
											<svg xmlns="http://www.w3.org/2000/svg"  width="12" height="12" viewBox="0 -960 960 960">
												<use href="#plus"></use>
											</svg>
										</button>
									</div>',
									$cart_item,
									$cart_item_key
								);
								echo '<div class="product-price" data-product-id="' . $variation_id . '">';
								echo wc_price($product_price * $cart_item['quantity']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo '</div>'
							?>
						</div>
					</div>
				<?php endif; ?>
			</li>
			<?php
		}
	}

	do_action( 'woocommerce_mini_cart_contents' );
	?>
	</ul>
	<div class="nbdc-mini-cart__footer">
		<p class="woocommerce-mini-cart__total total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</p>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

		<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
	</div>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
