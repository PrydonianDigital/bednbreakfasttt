<?php
/**
 * My Bookings
 *
 * Shows bookings on the account page
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<h3>My Deliveries</h3>

<table class="shop_table my_account_bookings">
	<thead>
		<tr>
			<th scope="col" class="booking-id"><?php _e( 'ID', 'woocommerce-bookings' ); ?></th>
			<th scope="col" class="booked-product"><?php _e( 'Ordered', 'woocommerce-bookings' ); ?></th>
			<th scope="col" class="order-number"><?php _e( 'Order', 'woocommerce-bookings' ); ?></th>
			<th scope="col" class="booking-start-date"><?php _e( 'Order Delivery/Collection Date', 'woocommerce-bookings' ); ?></th>
			<th scope="col" class="booking-status"><?php _e( 'Status', 'woocommerce-bookings' ); ?></th>
			<th scope="col" class="booking-cancel"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $bookings as $booking ) : ?>
			<tr>
				<td class="booking-id"><?php echo $booking->get_id(); ?></td>
				<td class="booked-product">
					<?php if ( $booking->get_product() ) : ?>
					<a href="<?php echo get_permalink( $booking->get_product()->id ); ?>">
						<?php echo $booking->get_product()->get_title(); ?>
					</a>
					<?php endif; ?>
				</td>
				<td class="order-number">
					<?php if ( $booking->get_order() ) : ?>
					<a href="<?php echo $booking->get_order()->get_view_order_url(); ?>">
						<?php echo $booking->get_order()->get_order_number(); ?>
					</a>
					<?php endif; ?>
				</td>
				<td class="booking-start-date"><?php echo $booking->get_start_date( wc_date_format() ); ?></td>
				<td class="booking-status"><?php echo $booking->get_status( false ); ?></td>
				<td class="booking-cancel">
					<?php if ( $booking->get_status() != 'cancelled' && $booking->get_status() != 'completed' && ! $booking->passed_cancel_day() ) : ?>
					<a href="<?php echo $booking->get_cancel_url(); ?>" class="button cancel"><?php _e( 'Cancel', 'woocommerce-bookings' ); ?></a>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
