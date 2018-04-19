<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<?php woocommerce_template_single_title(); ?>



<div id="product-<?php the_ID(); ?>" class="wrap_big_product">



	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary big_product_txt">
        <div class="stars norate">
            <span><?php rating(); ?></span>
        </div>

        <?php $currency_symbol = html_entity_decode( get_woocommerce_currency_symbol() ); ?>
        <?php if($product->sale_price) { ?>

            <div class="old_price">
                <?php
                echo $product->regular_price;
                echo " ".$currency_symbol;
                ?>
            </div>
            <div class="actual_price">
                <?php
                echo $product->sale_price;
                echo " ".$currency_symbol;
                ?>
            </div>
        <?php } else { ?>

            <div class="actual_price actual_price_one">
                <?php
                echo $product->regular_price;
                echo " ".$currency_symbol;
                ?>
            </div>

        <?php } ?>


        <div class="manufacturer">
            <p>Производитель <a href=""><?php $brands = wp_get_post_terms( $post->ID, 'pwb-brand', array("fields" => "all") );
                    foreach( $brands as $brand ) {
                        echo $brand->name;
                    }?></a></p>
        </div>

        <?php woocommerce_template_single_excerpt(); ?>
        <ul class="wrap_dignity">
            <li>
                <span><img src="<?php bloginfo('template_url'); ?>/img/pin/d1.png" alt="" /></span>
                <p>Гарантия качества</p>
            </li>
            <li>
                <span><img src="<?php bloginfo('template_url'); ?>/img/pin/d2.png" alt="" /></span>
                <p>Бесплатная доставка по Минску</p>
            </li>
            <li>
                <span><img src="<?php bloginfo('template_url'); ?>/img/pin/d3.png" alt="" /></span>
                <p>Сервис от производителя</p>
            </li>
            <li>
                <span><img src="<?php bloginfo('template_url'); ?>/img/pin/d4.png" alt="" /></span>
                <p>Скидка при комплексной покупке</p>
            </li>
        </ul>
        <div class="delivery_dignity">
            <div>Доставка
                <div class="tp_select">
                    <select>
                        <option>по Минску</option>
                        <option>по Гомелю</option>
                    </select>
                </div>
            </div>
            <span>Курьером до прихожей: <b>завтра, 10,80 руб.</b></span>
            <span>Самовывоз со склада в Минске: <b>завтра, бесплатно</b></span>
        </div>


		<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

<!--        <script>-->
<!--            jQuery(document).ready(function($){-->
<!--                $(".clickBuyButton").removeClass("button21");-->
<!--                $(".clickBuyButton").addClass("blue_btn");-->
<!--            });-->
<!--        </script>-->
	</div>
</div>
    <div id="tabs_big_product_id" class="tabs_big_product">
        <div class="wrap_tabs">
            <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
        </div>
    </div>


    <div class="wrap_together">
        <?php woocommerce_output_related_products(); ?>
    </div>
<div>


            <?php woocommerce_upsell_display(); ?>


</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
