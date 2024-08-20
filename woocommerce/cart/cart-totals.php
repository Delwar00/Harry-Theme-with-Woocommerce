<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
                             
				                                  
				         
<section class="cart-area pb-100">
         <div class="container">
             <div class="row">
                 <div class="col-12">
<div class="row justify-content-end cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
	<div class="col-md-5 mr-auto">
		<div class="cart-page-total">
		<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

		<ul cellspacing="0" class="mb-20 shop_table shop_table_responsive">

			<li class="cart-subtotal">
				<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
			</li>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<li class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<span><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
					<span data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
				</li>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

				<li class="shipping">
					<span><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></span>
					<span data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></span>
				</li>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<li class="fee">
					<span><?php echo esc_html( $fee->name ); ?></span>
					<span data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></span>
				</li>
			<?php endforeach; ?>

			<?php
			if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
				$taxable_address = WC()->customer->get_taxable_address();
				$estimated_text  = '';

				if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
					/* translators: %s location. */
					$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
				}

				if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
					foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						?>
						<li class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							<span><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<span data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
						</li>
						<?php
					}
				} else {
					?>
					<li class="tax-total">
						<span><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></span>
					</li>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<li class="order-total">
				<span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
				<span data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></span>
			</li>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</ul>

		<div class="wc-proceed-to-checkout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>

		</div>
	</div>
</div>
</div>
             </div>
         </div>
     </section>