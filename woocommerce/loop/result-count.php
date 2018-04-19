<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script>
    (function($) {
        $('#list').click(function(event){event.preventDefault();$('#catalog .wrap_product').removeClass('wrap_product_grid');$('#catalog .wrap_product').addClass('wrap_product_list');$('.info_product').removeClass('displaynone');});
        $('#grid').click(function(event){event.preventDefault();$('#catalog .wrap_product').removeClass('wrap_product_list');$('#catalog .wrap_product').addClass('wrap_product_grid');$('.info_product').addClass('displaynone');});
    })(jQuery);
</script>
<div class="wrap_show">
    <div class="wrap_view">
        <button class="view1" id="grid"></button>
        <button class="view2" id="list"></button>
    </div>
    <div class="sorting">
<p class="woocommerce-result-count">
	<?php
	if ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
