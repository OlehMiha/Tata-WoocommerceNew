<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>



<label for="payment_method_<?php echo $gateway->id; ?>"><input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
    <div class="del_label">

        <?php if($gateway->get_title() == "Наличными курьеру") { ?>
        <span class="imp_paym_method"><img src="<?php bloginfo('template_url'); ?>/img/pin/p1.png" alt="" /></span>
        <?php } else if($gateway->get_title() == "Банковской картой"){ ?>
        <span class="imp_paym_method"><img src="<?php bloginfo('template_url'); ?>/img/pin/p2.png" alt="" /></span>
        <?php } else if($gateway->get_title() == "Система ЕРИП"){ ?>
        <span class="imp_paym_method"><img src="<?php bloginfo('template_url'); ?>/img/pin/p3.png" alt="" /></span>
        <?php } else { ?>
            <span class="imp_paym_method"><img src="<?php bloginfo('template_url'); ?>/img/pin/p1.png" alt="" /></span>
        <?php } ?>

        <h5><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></h5>
        <?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
        <p><?php $gateway->payment_fields(); ?></p>
        <?php endif; ?>
    </div>
</label>



