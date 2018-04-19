<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
    $post_thumbnail_id = $product->get_image_id();
?>


<div class="big_product_photo">
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">

            <?php
            if ( has_post_thumbnail() ) {
                $html  = my_wc_get_gallery_image_html( $post_thumbnail_id, true );

            } else {
                $html  = '<div class="swiper-slide">';
                $html .= sprintf( '<a href="#" data-src="%s" data-fancybox="gallery"><img src="%s" alt="%s" class="wp-post-image" /></a>', esc_url( wc_placeholder_img_src() ), esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                $html .= '</div>';
            }

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

            do_action( 'woocommerce_product_thumbnails' );
            ?>


        </div>
        <div class="swiper-button-next swiper-button-next4"></div>
        <div class="swiper-button-prev swiper-button-prev4"></div>
        <span class="resize"><img src="<?php bloginfo('template_url'); ?>/img/pin/resize.png" alt="" /></span>
        <?php woocommerce_show_product_sale_flash(); ?>
    </div>

    <?php $attachment_ids = $product->get_gallery_image_ids();
    if ( $attachment_ids && has_post_thumbnail() ) { ?>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper" style="margin-left: -25%!important;">
            <?php
                $html  = my_wc_get_gallery_image_html_2( $post_thumbnail_id, true );
                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

                foreach ( $attachment_ids as $attachment_id ) {
                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', my_wc_get_gallery_image_html_2( $attachment_id  ), $attachment_id );
                }

            ?>
        </div>
        <div class="swiper-button-next swiper-button-next4"></div>
        <div class="swiper-button-prev swiper-button-prev4"></div>
    </div>
    <?php } ?>
</div>