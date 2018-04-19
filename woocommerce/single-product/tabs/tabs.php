<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );


if ( ! empty( $tabs ) ) : ?>

		<ul class="tabs_caption">
            <?php $c = 1; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>

            <?php if($tab['title'] == "Описание") { ?>
				<li class="<?php if ($c == 1) echo('active'); ?>">Обзор</li>
            <?php } else if($tab['title'] == "Бренд") { ?>

            <?php } else if($tab['title'] == "Детали") { ?>
                <li class="<?php if ($c == 1) echo('active'); ?>">характеристики</li>
            <?php } else { ?>
                <li class="<?php if ($c == 1) echo('active'); ?>"><?php echo  $tab['title'] ?></li>
            <?php } ?>

                <?php $c++; ?>
			<?php endforeach; ?>
		</ul>
        <div class="wr_tabs">

            <?php $c = 1; ?>
		<?php foreach ( $tabs as $key => $tab ) : ?>

            <?php if($tab['title'] != "Бренд") : ?>
            <div class="tabs_content <?php if ($c == 1) echo('active'); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
            </div>

                <?php $c++; ?>
            <?php endif; ?>

		<?php endforeach; ?>
        </div>


<?php endif; ?>
