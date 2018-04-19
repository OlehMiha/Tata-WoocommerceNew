<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews wrap_reviews">
		<h5 class=" ">Все отзывы <b>(<?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) {
            echo $count;
			} else {
				_e( 'Reviews', 'woocommerce' );
			}
		?>)</b></h5>

		<?php if ( have_comments() ) : ?>

            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>


			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<div class="woocommerce-pagination pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
                    'prev_text'    => '',
                    'next_text'    => '',
                    'type'         => '',
                    'before_page_number' => '', // строка перед цифрой
                    'after_page_number' => '' // строка после цифры
				) ) );
				echo '</div>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>


	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

			<div class="form_contacts">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? 'Оставить отзыв' : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'title_reply_before'   => '<h5 id="reply-title">',
						'title_reply_after'    => '</h5>',
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
                            'rating' => '<p>Рейтинг</p><div class="stars stars_comment_off"><select style="opacity: 0;" name="rating" id="rating" aria-required="true" required>
                                        <option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
                                        <option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
                                        <option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
                                        <option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
                                        <option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
                                        <option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
                                    </select></div>',
							'author' => '<p class="comment-form-author">Ваше имя <b class="required">*</b></p>' .
										'<input id="author" name="author" type="text" class="tp_inp" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required />',
							'phone'  => '<p class="comment-form-phone">Номер телефона <b class="required">*</b></p>' .
										'<input id="phone" name="phone"  type="phone" class="tp_inp" value="' . esc_attr( $commenter['comment_author_phone'] ) . '" size="30" aria-required="true" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => '',
                        'class_form' => 'form',
                        'class_submit' =>'orng_btn',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}


					$comment_form['comment_field'] .= '<p class="comment-form-comment">Ваше сообщение <b class="required">*</b></p><textarea id="comment" name="comment" class="tp_txtarea" aria-required="true" required></textarea><p><span>Ваш запрос будет обработан в рабочее время. Обязательные поля отмечены <b>*</b></span></p>';





					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
