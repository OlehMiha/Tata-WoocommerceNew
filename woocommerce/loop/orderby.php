<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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


<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
</div>
</div>
<div class="smart_filter">
    <div class="list_smart_filter">
        <h5>Популярные</h5>
        <ul>
            <li><a href="/dlya-novorozhdennyh/">Для новорожденных</a></li>
            <li><a href="/derevyannye-krovatki-transformery/">Деревянные кроватки трансформеры</a></li>
            <li><a href="/s-mayatnikovym-mehanizmom/">С маятниковым механизмом</a></li>
            <li><a href="/krovatki-kachalki/">Кроватки качалки</a></li>
        </ul>
    </div>
    <div class="list_smart_filter">
        <h5>готовые варианты</h5>
        <ul>
            <li><a href="/dlya-novorozhdennyh/">Для новорожденных</a></li>
            <li><a href="/s-mayatnikom-i-kolesami-svetlye/">С маятником и колесами светлые</a></li>
            <li><a href="/s-prodolnym-mayatnikom-i-yashhikom/">С продольным маятником и ящиком</a></li>
            <li><a href="/s-poperechnym-mayatnikom/">С поперечным маятником</a></li>
        </ul>
    </div>
    <div class="list_smart_filter">
        <h5>По производителю</h5>
        <ul>
            <li><a href="/brand/avent/">Avent</a></li>
            <li><a href="/brand/britax/">Britax</a></li>
            <li><a href="/brand/dr-browns/">Dr Brown’s</a></li>
            <li><a href="/brand/little-pony/">Little Pony</a></li>
        </ul>
    </div>
</div>