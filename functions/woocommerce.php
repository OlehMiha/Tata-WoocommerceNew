<?php
/* Переопределенные Woo function */
function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
}

function woocommerce_template_loop_product_thumbnail() {
    echo '<a href="'. get_the_permalink() . '" class="product_img">';
    echo woocommerce_get_product_thumbnail();
    echo "</a>";
}

function woocommerce_template_loop_product_title() {
    echo '<a class="product_title" href="' . get_the_permalink(). '">' . get_the_title() . '</a>';
}

function woocommerce_template_loop_product_link_close() {

}

add_filter('woocommerce_add_to_cart_fragments', 'change_add_to_cart',35);
function change_add_to_cart($arr){
    $html = '<span>' . sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count()) . '
<script>
  jQuery(".jq-number__spin").click(function(event) {

  var val = Number(jQuery(this).parent(".jq-number").find("input").val());
  if(jQuery(this).hasClass("minus"))
  {
    if(val>1){
      val = val - 1;
    }
  } 
  else if(jQuery(this).hasClass("plus"))
  {
    val = val + 1;
  }
  jQuery(this).parent(".jq-number").find("input").val(Number(val));

  jQuery("[name=update_cart]").removeAttr("disabled");
  jQuery("[name=update_cart]").trigger("click");
    });
  
  jQuery(".quantity input").change(function($) {
    
    jQuery("[name=update_cart]").removeAttr("disabled");
    jQuery("[name=update_cart]").trigger("click");
  });
  
  
  
</script>
<script>
    var swiper = new Swiper(\'.swiper-container3\', {
        nextButton: \'.swiper-button-next3\',
        prevButton: \'.swiper-button-prev3\',
        spaceBetween: 20,
        slidesPerView: \'auto\',
        loop:true,
        observer: true,
        observeParents: true,
        speed:1000
    });
</script>
</span>';

    return['div.basket span' => $html];
}


function woocommerce_form_field( $key, $args, $value = null ) {
    $defaults = array(
        'type'              => 'text',
        'label'             => '',
        'description'       => '',
        'placeholder'       => '',
        'maxlength'         => false,
        'required'          => false,
        'autocomplete'      => false,
        'id'                => $key,
        'class'             => array(),
        'label_class'       => array(),
        'input_class'       => array(),
        'return'            => false,
        'options'           => array(),
        'custom_attributes' => array(),
        'validate'          => array(),
        'default'           => '',
        'autofocus'         => '',
        'priority'          => '',
    );

    $args = wp_parse_args( $args, $defaults );
    $args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

    if ( $args['required'] ) {
        $args['class'][] = 'validate-required';
        $required        = ' <b class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</b>';
    } else {
        $required = '';
    }

    if ( is_string( $args['label_class'] ) ) {
        $args['label_class'] = array( $args['label_class'] );
    }

    if ( is_null( $value ) ) {
        $value = $args['default'];
    }

    // Custom attribute handling.
    $custom_attributes         = array();
    $args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

    if ( $args['maxlength'] ) {
        $args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
    }

    if ( ! empty( $args['autocomplete'] ) ) {
        $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
    }

    if ( true === $args['autofocus'] ) {
        $args['custom_attributes']['autofocus'] = 'autofocus';
    }

    if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
        foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
            $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
        }
    }

    if ( ! empty( $args['validate'] ) ) {
        foreach ( $args['validate'] as $validate ) {
            $args['class'][] = 'validate-' . $validate;
        }
    }

    $field           = '';
    $label_id        = $args['id'];
    $sort            = $args['priority'] ? $args['priority'] : '';
    $field_container = '%3$s';

    switch ( $args['type'] ) {
        case 'textarea':
            $field .= '<textarea name="' . esc_attr( $key ) . '" class="tp_txtarea input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

            break;
        case 'checkbox':
            $field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
            <input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

            break;
        case 'password':
        case 'text':
        case 'email':
        case 'tel':
        case 'number':
            $field .= '<input type="' . esc_attr( $args['type'] ) . '" class="tp_inp input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';
            if($args['id'] == 'billing_address_1' || $args['id'] == 'billing_new_dom' || $args['id'] == 'billing_new_korpus'){
                $field .='</div>';
            } else if ($args['id'] == 'billing_new_kvartira') {
                $field .='</div>
                </div>
                <div><a href="checkout.html#" class="add_comm">Добавить комментарий к заказу</a></div>
                ';
            }
            break;
        case 'select':
            $field   = '';
            $options = '';

            if ( ! empty( $args['options'] ) ) {
                foreach ( $args['options'] as $option_key => $option_text ) {
                    if ( '' === $option_key ) {
                        // If we have a blank option, select2 needs a placeholder.
                        if ( empty( $args['placeholder'] ) ) {
                            $args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
                        }
                        $custom_attributes[] = 'data-allow_clear="true"';
                    }
                    $options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
                }

                $field .= '<div class="tp_select"><select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
              ' . $options . '
            </select></div>';
                if($args['id'] == 'billing_city'){
                    $field .='</div>';
                }
            }

            break;
        case 'radio':
            $label_id = current( array_keys( $args['options'] ) );

            if ( ! empty( $args['options'] ) ) {
                foreach ( $args['options'] as $option_key => $option_text ) {
                    $field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
                    $field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
                }
            }

            break;
    }

    if ( ! empty( $field ) ) {
        $field_html = '';

        if ( $args['label'] && 'checkbox' !== $args['type'] ) {
            if($args['id'] == 'billing_first_name'){

                $field_html .= '<div class="item_checkout  is_open">
        <div class="title_checkout">
            <p>1  Контактная информация</p>
            <a href="#" class="edit_checkout">Редактировать</a>
        </div>
        <div class="checkout">
            <div class="form_contacts">
                <div class="form">';
                $field_html .= '<p>' . $args['label'] . $required . '</p>';
            }
            else if($args['id'] == 'billing_city'){

                $field_html .= '<p><span>Ваш запрос будет обработан в рабочее время. Обязательные поля отмечены <b>*</b></span></p>
                    
                <a href="#" class="orng_btn next_btn">Продолжить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="item_checkout  is_open">
        <div class="title_checkout">
            <p>2  способ доставки</p>
            <a href="#" class="edit_checkout">Редактировать</a>
        </div>
        <div class="checkout">
            <div class="delivery_method">
                <div class="city_del">';
                $field_html .= $args['label'] . $required;
            }
            else if($args['id'] == 'billing_address_1'){

                $field_html .= wc_cart_totals_shipping_html() . '
                <h5>Адрес доставки</h5>
                <div class="address_del">
                    <div class="inp_addr">';
                $field_html .= '<p>' . $args['label'] . $required . '</p>';
            }
            else if($args['id'] == 'billing_new_dom' || $args['id'] == 'billing_new_korpus' || $args['id'] == 'billing_new_kvartira'){

                $field_html .= '<div class="inp_addr">';
                $field_html .= '<p>' . $args['label'] . $required . '</p>';
            }
            else {
                $field_html .= '<p>' . $args['label'] . $required . '</p>';
            }
        }

        $field_html .= $field;

        if ( $args['description'] ) {
            $field_html .= '<span class="description">' . esc_html( $args['description'] ) . '</span>';
        }

        $container_class = esc_attr( implode( ' ', $args['class'] ) );
        $container_id    = esc_attr( $args['id'] ) . '_field';
        $field           = sprintf( $field_container, $container_class, $container_id, $field_html );
    }

    $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

    if ( $args['return'] ) {
        return $field;
    } else {
        echo $field; // WPCS: XSS ok.

        if($args['id'] == 'billing_new_kvartira'){
            do_action( 'woocommerce_checkout_shipping' );
        }
    }
}

//Артикул
function shop_sku(){
    global $product;
    return ' <span class="article">Артикул: ' . $product->sku . '</span>';
}

//Доставка по России
add_filter( 'woocommerce_states', 'new_rus_woocommerce_states' );
function new_rus_woocommerce_states( $states ) {
    $states['RU'] = array(
        'MSK' => 'Москва',
        'SPB' => 'Санкт-Петербург',
        'NOV' => 'Новосибирск',
        'EKB' => 'Екатеринбург',
        'NN' => 'Нижний Новгород',
        'KZN' => 'Казань',
        'CHL' => 'Челябинск',
        'OMSK' => 'Омск',
        'SMR' => 'Самара',
        'RND' => 'Ростов-на-Дону',
        'UFA' => 'Уфа',
        'PRM' => 'Пермь',
        'KRN' => 'Красноярск',
        'VRZH' => 'Воронеж',
        'VLG' => 'Волгоград',
        'SIMF' => 'Симферополь',
        'ABAO' => 'Агинский Бурятский авт.окр.',
        'AR' => 'Адыгея Республика',
        'ALR' => 'Алтай Республика',
        'AK' => 'Алтайский край',
        'AMO' => 'Амурская область',
        'ARO' => 'Архангельская область',
        'ACO' => 'Астраханская область',
        'BR' => 'Башкортостан республика',
        'BEO' => 'Белгородская область',
        'BRO' => 'Брянская область',
        'BUR' => 'Бурятия республика',
        'VLO' => 'Владимирская область',
        'VOO' => 'Волгоградская область',
        'VOLGO' => 'Вологодская область',
        'VORO' => 'Воронежская область',
        'DR' => 'Дагестан республика',
        'EVRAO' => 'Еврейская авт. область',
        'IO' => 'Ивановская область',
        'IR' => 'Ингушетия республика',
        'IRO' => 'Иркутская область',
        'KBR' => 'Кабардино-Балкарская республика',
        'KNO' => 'Калининградская область',
        'KMR' => 'Калмыкия республика',
        'KLO' => 'Калужская область',
        'KMO' => 'Камчатская область',
        'KCHR' => 'Карачаево-Черкесская республика',
        'KR' => 'Карелия республика',
        'KEMO' => 'Кемеровская область',
        'KIRO' => 'Кировская область',
        'KOMI' => 'Коми республика',
        'KPAO' => 'Коми-Пермяцкий авт. окр.',
        'KRAO' => 'Корякский авт.окр.',
        'KOSO' => 'Костромская область',
        'KRSO' => 'Краснодарский край',
        'KRNO' => 'Красноярский край',
        'KRYM' => 'Крым Республика',
        'KURGO' => 'Курганская область',
        'KURO' => 'Курская область',
        'LENO' => 'Ленинградская область',
        'LPO' => 'Липецкая область',
        'MAGO' => 'Магаданская область',
        'MER' => 'Марий Эл республика',
        'MOR' => 'Мордовия республика',
        'MSKO' => 'Московская область',
        'MURO' => 'Мурманская область',
        'NAO' => 'Ненецкий авт.окр.',
        'NZHO' => 'Нижегородская область',
        'NVGO' => 'Новгородская область',
        'NVO' => 'Новосибирская область',
        'OMO' => 'Омская область',
        'OPENO' => 'Оренбургская область',
        'OPLO' => 'Орловская область',
        'PENO' => 'Пензенская область',
        'PERO' => 'Пермский край',
        'PRO' => 'Приморский край',
        'PSO' => 'Псковская область',
        'RSO' => 'Ростовская область',
        'RZO' => 'Рязанская область',
        'SMRO' => 'Самарская область',
        'SRP' => 'Саратовская область',
        'SYAR' => 'Саха(Якутия) республика',
        'SKHO' => 'Сахалинская область',
        'SVO' => 'Свердловская область',
        'SOAR' => 'Северная Осетия - Алания республика',
        'SMO' => 'Смоленская область',
        'STK' => 'Ставропольский край',
        'TRAO' => 'Таймырский (Долгано-Ненецкий) авт. окр.',
        'TMBO' => 'Тамбовская область',
        'TTR' => 'Татарстан республика',
        'TVO' => 'Тверская область',
        'TMO' => 'Томская область',
        'TVR' => 'Тыва республика',
        'TULO' => 'Тульская область',
        'TUMO' => 'Тюменская область',
        'UDO' => 'Удмуртская республика',
        'ULO' => 'Ульяновская область',
        'UOBAO' => 'Усть-Ордынский Бурятский авт.окр.',
        'KHBK' => 'Хабаровский край',
        'KHKR' => 'Хакасия республика',
        'KHMAO' => 'Ханты-Мансийский авт.окр.',
        'CHLO' => 'Челябинская область',
        'CHCHR' => 'Чеченская республика',
        'CHTO' => 'Читинская область',
        'CHVR' => 'Чувашская республика',
        'CHKAO' => 'Чукотский авт.окр.',
        'EVAO' => 'Эвенкийский авт.окр.',
        'YANO' => 'Ямало-Ненецкий авт.окр.',
        'YAO' => 'Ярославская область'

    );

    return $states;
}


//Вывод картинки внутри
function my_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
    $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
    $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
    $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size' );
    $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single': $thumbnail_size );
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
        'title'                   => get_post_field( 'post_title', $attachment_id ),
        'data-src'                => $full_src[0],
        'class'                   => $main_image ? 'wp-post-image' : '',
    ) );

    return '<div class="swiper-slide" ><a href="' . esc_url( $full_src[0] ) . '" data-src="' . esc_url( $full_src[0] ) . '" data-fancybox="gallery" class="iner_product_a"  >' . $image . '</a></div>';
}
function my_wc_get_gallery_image_html_2( $attachment_id, $main_image = false ) {
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    return '<div class="swiper-slide" style="background-image:url(' . esc_url( $full_src[0] ) . ')"></div>';
}



/**
 * Делаем поля необязательными
 *
 */
function wc_npr_filter_phone($address_fields) {
    $address_fields['billing_email']['required'] = false;
    return $address_fields;
}
add_filter('woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1);


/*Комментарии к товарам*/
function remove_comment_fields($fields) {
    unset($fields['url']);
    unset($fields['email']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');


add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('stars','rating','author','phone','email','comment'); // нужный порядок

    foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
        foreach( $fields as $key => $val )
            $new_fields[ $key ] = $val;

    return $new_fields;
}

add_action( 'comment_post', 'save_extend_comment_meta_data' );
function save_extend_comment_meta_data( $comment_id ){

    if( !empty( $_POST['phone'] ) ){
        $phone = sanitize_text_field($_POST['phone']);
        add_comment_meta( $comment_id, 'phone', $phone );
    }


}

add_filter( 'preprocess_comment', 'verify_extend_comment_meta_data' );
function verify_extend_comment_meta_data( $commentdata ) {

    if ( empty( $_POST['phone'] ) || ! (int)$_POST['phone'] )
        wp_die( __( 'Error: You did not add a phone.' ) );

    return $commentdata;
}


// Отображение содержимого метаполей во фронт-энде
add_filter( 'comment_text', 'modify_extend_comment');
function modify_extend_comment( $text ){
    global $post;



    if( $commentrating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {

        $commentrating = wp_star_rating( array (
            'rating' => $commentrating,
            'echo'=> false
        ));

        $text = $text . $commentrating;
    }

    return $text;
}


add_action( 'wp_enqueue_scripts', 'check_count_extend_comments' );
function check_count_extend_comments(){
    global $post;

    if( isset($post) && (int)$post->comment_count > 0 ){
        require_once ABSPATH .'wp-admin/includes/template.php';
        add_action('wp_enqueue_scripts', function(){
            wp_enqueue_style('dashicons');
        });

        $stars_css = '
		.star-rating .star-full:before { content: "\f155"; }
		.star-rating .star-empty:before { content: "\f154"; }
		.star-rating .star {
			color: #0074A2;
			display: inline-block;
			font-family: dashicons;
			font-size: 20px;
			font-style: normal;
			font-weight: 400;
			height: 20px;
			line-height: 1;
			text-align: center;
			text-decoration: inherit;
			vertical-align: top;
			width: 20px;
		}
		';

        wp_add_inline_style( 'dashicons', $stars_css );
    }

}

// Добавляем новый метабокс на страницу редактирования комментария
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box(){
    add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

// Отображаем наши поля
function extend_comment_meta_box( $comment ){
    $phone  = get_comment_meta( $comment->comment_ID, 'phone', true );

    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?>
    <p>
        <label for="phone"><?php _e( 'Phone' ); ?></label>
        <input type="text" name="phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat" />
    </p>

    <?php
}

add_action( 'edit_comment', 'extend_comment_edit_meta_data' );
function extend_comment_edit_meta_data( $comment_id ) {
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) )
        return;

    if( !empty($_POST['phone']) ){
        $phone = sanitize_text_field($_POST['phone']);
        update_comment_meta( $comment_id, 'phone', $phone );
    }
    else
        delete_comment_meta( $comment_id, 'phone');


}






add_filter('woocommerce_output_related_products_args', 'change_attr_related');
function change_attr_related($arg){
    $args = array(
      'post_per_page' => 0,
      'colums' => 1,
      'orderby' => 'rand'
    );
    return $args;
}






//Окно товара
add_action('wp_ajax_ajax_quick_viwe', 'tata_quick_viwe_product_callback');
add_action('wp_ajax_nopriv_ajax_quick_viwe', 'tata_quick_viwe_product_callback');
function tata_quick_viwe_product_callback(){

//    if ( ! wp_verify_nonce( $_POST['nonce'], 'add-nonce' ) ) {
//        wp_die( 'Данные отправлены с левого адреса' );
//    }

    $product = wc_get_product(esc_attr($_POST['id']));
   //print_r($product);
    ob_start();
    ?>
    <?php $currency_symbol = html_entity_decode( get_woocommerce_currency_symbol() ); ?>
    <div class="top_modal_basket">
        <h5>Товар добавлен в корзину</h5>
        <p>В вашей корзине <a href="<?php echo get_home_url(); ?>/cart"><?php echo ((int)(WC()->cart->get_cart_contents_count()) + 1 ) ; ?> товар</a></p>
        <div class="product_mod_bask">
            <?php
            $attachment_id = get_post_thumbnail_id( $product->get_id() );
            $product_thumb = wp_get_attachment_image_url( $attachment_id, 'full');
            ?>
            <a href="<?php echo get_permalink($_POST['id']); ?>" class="product_mod_img"><img src="<?php echo $product_thumb; ?>" alt="" /></a>
            <a href="<?php echo get_permalink($_POST['id']); ?>" class="product_mod_title"><?php echo $product->get_name(); ?></br>
                <p class="p_modal_short_description"><?php echo $product->short_description; ?></p>
            </a>

            <div class="number_inp">
                <?php $product->get_sale_price(); ?>
            </div>
            <div class="product_mod_price">

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
            </div>
        </div>
        <div class="btn_top_modal_basket">
            <a data-fancybox-close href="#" class="blue_btn">Продолжить покупки</a>
            <a href="<?php echo get_home_url(); ?>/cart" class="orng_btn">Оформить заказ</a>
        </div>
    </div>

    <?php $upsells = $product->get_upsells();
    if ($upsells) :


        ?>
        <div class="btm_modal_basket">
    <h5>рекомендуем</h5>
    <div class="wrap_recommendations wrap_recommendations1">
        <div class="swiper-container swiper-container3">

            <div class="swiper-wrapper">
                 <?php foreach ( $upsells as $upsell ) : ?>

                <div class="swiper-slide">
                    <?php
                    $post_object = get_post( $upsell );

                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    wc_get_template_part( 'content', 'product' ); ?>
                </div>

                <?php endforeach;?>

            </div>

        </div>
        <div class="swiper-button-next swiper-button-next3"></div>
        <div class="swiper-button-prev swiper-button-prev3"></div>
    </div>

        </div>
    <?php endif; ?>

    <button data-fancybox-close="" class="fancybox-close-small" title="Close"></button>




    <script>
        var swiper = new Swiper('.swiper-container3', {
            nextButton: '.swiper-button-next3',
            prevButton: '.swiper-button-prev3',
            spaceBetween: 20,
            slidesPerView: 'auto',
            loop:true,
            observer: true,
            observeParents: true,
            speed:1000
        });
    </script>
    <?php
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
}



add_action('wp_footer', 'modal_add_product');
function modal_add_product(){
    ?>

    <div class="modal" id="modal_basket">
        <button data-fancybox-close="" class="fancybox-close-small" title="Close"></button>
    </div>

<?php
}


/**
 * Изменяем текст добавления в корзину на странице товара
 */
add_filter('single_add_to_cart_text', 'woo_custom_cart_button_text');

function woo_custom_cart_button_text() {

    global $woocommerce;

    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];

        if( get_the_ID() == $_product->id ) {
            return __('В корзине', 'woocommerce');
        }
    }

    return __('В корзину', 'woocommerce');
}

/**
 * Изменяем текст добавления в корзину на странице архивов товара
 */
add_filter( 'add_to_cart_text', 'woo_archive_custom_cart_button_text' );

function woo_archive_custom_cart_button_text() {

    global $woocommerce;

    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];

        if( get_the_ID() == $_product->id ) {
            return __('В корзине', 'woocommerce');
        }
    }

    return __('В корзину', 'woocommerce');
}



/**
 * Show an archive description on taxonomy archives.
 */
function woocommerce_taxonomy_archive_description() {
    if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
        $term = get_queried_object();

        if ( $term && ! empty( $term->description ) ) {
            echo '<div class="footnote">' . wc_format_content( $term->description ) . '</div>'; // WPCS: XSS ok.
        }
    }
}


/**
 * Show a shop page description on product archives.
 */
function woocommerce_product_archive_description() {
    // Don't display the description on search results page.
    if ( is_search() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) && 0 === absint( get_query_var( 'paged' ) ) ) {
        $shop_page = get_post( wc_get_page_id( 'shop' ) );
        if ( $shop_page ) {
            $description = wc_format_content( $shop_page->post_content );
            if ( $description ) {
                echo '<div class="footnote">' . $description . '</div>'; // WPCS: XSS ok.
            }
        }
    }
}


















// Remove
/**
 * Hook: Woocommerce_single_product_summary.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 * @hooked WC_Structured_Data::generate_product_data() - 60
 */
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );


/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action( 'woocommerce_after_single_product_summary' , 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary' , 'woocommerce_output_related_products', 20 );




remove_action( 'woocommerce_before_main_content' , 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_single_product_summary' , 'woocommerce_show_product_sale_flash', 10 );


/**
 * Cart collaterals hook.
 *
 * @hooked woocommerce_cross_sell_display
 * @hooked woocommerce_cart_totals - 10
 */
remove_action( 'woocommerce_cart_collaterals' , 'woocommerce_cross_sell_display' );

?>