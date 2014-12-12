<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0

 INSERT YOUR DOMAIN INTO YOUR_DOMAIN ON LINE 24, INSERT YOUR PHONE NUMBER ON LINE 30
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;


?>

<?php
	// Availability
	$availability = $product->get_availability();
        
	if ( $availability['class'] == 'out-of-stock' )
		echo apply_filters( 'woocommerce_stock_html', '<div class="out-stock-wrapper"><div class="out-stock"><div class="wr-c">'.__('Out of stock', YOUR_DOMAIN).'</div></div></div>', $availability['availability'] );
?>

<?php if ( ! $product->is_purchasable() ) : ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<div id="call-for-inquiry" class="cart">
		PLEASE CALL FOR INQUIRY: YOUR PHONE NUMBER HERE
	</div>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php elseif ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<button type="submit" class="single_add_to_cart_button <?php if(ravits_get_option('ajax_addtocart')): ?>etheme-simple-product<?php endif; ?> button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>


<?php endif; ?>