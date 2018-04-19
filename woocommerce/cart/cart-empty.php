<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();
if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
    <div class="return-to-shop wrap_404 cart_empty">
    <div class="cart_empty_img">
        <img src="/wp-content/themes/tata/img/svg/cart_empty.svg" alt="" />
    </div>
    <div class="txt_404">
        <h5>Ваша корзина пуста</h5>
        <p>Ваша корзина к сожалению пуста. Для старта покупок, зайдите в <a href="/shop/"> Каталог</a> нашего интернет-магазина. Ассортимент товаров для кровли и строительства весьма широк.</p>
        <a href="/shop/" class="blue_btn">Перейти в каталог</a>
    </div>
</div>
<?php endif; ?>
