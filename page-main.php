<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Главная
 */
get_header(); // подключаем header.php ?>
        <div class="content">
            <div class="container">
                <div class="block1">
                    <div class="slider_item">
                        <div class="swiper-container swiper-container2">
                            <div class="swiper-wrapper">
					<?php if( have_rows('слайдер') ): ?>
	            	<?php while ( have_rows('слайдер') ) : the_row(); ?>
                                <div class="swiper-slide">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <?php the_sub_field('текст'); ?>
                                </div>
					<?php endwhile; ?>
					<?php endif; ?>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination2"></div>
                        <div class="swiper-button-next swiper-button-next2"></div>
                        <div class="swiper-button-prev swiper-button-prev2"></div>
                    </div>
                    <div class="wrap_shares">
					<?php if( have_rows('баннер') ): ?>
	            	<?php while ( have_rows('баннер') ) : the_row(); ?>
                        <a href="<?php the_sub_field('ссылка'); ?>" class="share share1">
                            <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                            <?php the_sub_field('текст'); ?>
                        </a>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('баннер2') ): ?>
	            	<?php while ( have_rows('баннер2') ) : the_row(); ?>
                        <a href="<?php the_sub_field('ссылка'); ?>" class="share share2">
                            <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                            <?php the_sub_field('текст'); ?>
                        </a>
					<?php endwhile; ?>
					<?php endif; ?>
                    </div>
                </div>
                <ul class="list_advantage">
                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/img/advantage/1.png" alt="" /></span>
                        <p>Гарантия качества</p>
                    </li>
                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/img/advantage/2.png" alt="" /></span>
                        <p>Сервис от производителя</p>
                    </li>
                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/img/advantage/3.png" alt="" /></span>
                        <p>Бесплатная доставка по Минску</p>
                    </li>
                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/img/advantage/4.png" alt="" /></span>
                        <p>Скидка при комплексной покупке</p>
                    </li>
                </ul>
                <div class="product_tabs">
                    <div class="wrap_tabs">
                        <ul class="tabs_caption">
                            <li class="active">Популярные </li>
                            <li>скидки</li>
                            <li>Новые поступления</li>
                        </ul>
                        <div class="wr_tabs">

                            <!-- Рекомендованные -->
                            <div class="tabs_content active">
                                <div class="wrap_product wrap_product_grid">

								<?php
                                    $params = array(
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 8,
                                        'meta_key' => 'total_sales',
                                        'orderby' => 'meta_value_num',
                                        'meta_query'     => array(
                                            array( // Simple products type
                                                'key'           => 'total_sales',
                                                'value'         => 0,
                                                'compare'       => '>',
                                                'type'          => 'numeric'
                                            ),
                                        ),
                                    );
                                    $wc_query = new WP_Query($params);
                                ?>
                                <?php if ($wc_query->have_posts()) : ?>
                                <?php while ($wc_query->have_posts()) :  $wc_query->the_post(); ?>

                                    <?php wc_get_template_part( 'content','product' ) ?>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); // (5) ?>
                                <?php else:  ?>
                                <p>
                                     <?php _e( 'No Products' ); // (6) ?>
                                </p>
                                <?php endif; ?>
                                </div>
                            </div>

                            <!-- Акционные -->
                            <div class="tabs_content">
                                <div class="wrap_product">
    								<?php
                                        $params = array(
                                                'posts_per_page' => 8,
                                                'post_type'      => 'product',
                                                'meta_query'     => array(
                                                    'relation' => 'OR',
                                                        array( // Simple products type
                                                            'key'           => '_sale_price',
                                                            'value'         => 0,
                                                            'compare'       => '>',
                                                            'type'          => 'numeric'
                                                        ),
                                                        array( // Variable products type
                                                            'key'           => '_min_variation_sale_price',
                                                            'value'         => 0,
                                                            'compare'       => '>',
                                                            'type'          => 'numeric'
                                                        )
                                                    )
                                                );
                                        $wc_query = new WP_Query($params);
                                    ?>
                                    <?php if ($wc_query->have_posts()) : ?>
                                    <?php while ($wc_query->have_posts()) : $wc_query->the_post();?>

                                    	<?php wc_get_template_part( 'content','product' ) ?>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); // (5) ?>
                                    <?php else:  ?>
                                    <p>
                                         <?php _e( 'No Products' ); // (6) ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Новые -->
                            <div class="tabs_content">
                                <div class="wrap_product">
                                    <?php
                                        $params = array(
                                                'posts_per_page' => 8,
                                                'post_type' => 'product',
                                        );
                                        $wc_query = new WP_Query($params);
                                    ?>
                                    <?php if ($wc_query->have_posts()) : ?>
                                    <?php while ($wc_query->have_posts()) : $wc_query->the_post();?>

                                        <?php wc_get_template_part( 'content','product' ) ?>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); // (5) ?>
                                    <?php else:  ?>
                                    <p>
                                         <?php _e( 'No Products' ); // (6) ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <h5>Бренды</h5>
                <div class="wrap_brand">
                    <div class="swiper-container swiper-container1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="/brand/britax/"><img src="<?php bloginfo('template_url'); ?>/img/brand/1.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/tinylove/"><img src="<?php bloginfo('template_url'); ?>/img/brand/2.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/mozhga/"><img src="<?php bloginfo('template_url'); ?>/img/brand/3.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/little-pony/"><img src="<?php bloginfo('template_url'); ?>/img/brand/4.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/avent/"><img src="<?php bloginfo('template_url'); ?>/img/brand/5.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/dr-browns/"><img src="<?php bloginfo('template_url'); ?>/img/brand/6.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/britax/"><img src="<?php bloginfo('template_url'); ?>/img/brand/1.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/tinylove"><img src="<?php bloginfo('template_url'); ?>/img/brand/2.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/mozhga/"><img src="<?php bloginfo('template_url'); ?>/img/brand/3.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/little-pony/"><img src="<?php bloginfo('template_url'); ?>/img/brand/4.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/avent/"><img src="<?php bloginfo('template_url'); ?>/img/brand/5.png" alt="" /></a></div>
                            <div class="swiper-slide"><a href="/brand/dr-browns/"><img src="<?php bloginfo('template_url'); ?>/img/brand/6.png" alt="" /></a></div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next1"></div>
                    <div class="swiper-button-prev swiper-button-prev1"></div>
                </div>
                <div class="wrap_categories">
                    <div class="categories">
					<?php if( have_rows('баннер3') ): ?>
	            	<?php while ( have_rows('баннер3') ) : the_row(); ?>
                        <a href="<?php the_sub_field('ссылка'); ?>" class="big_cat">
                            <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                            <p><?php the_sub_field('текст'); ?></p>
                        </a>
					<?php endwhile; ?>
					<?php endif; ?>
                        <div class="wrap_sm_cat">
                            <div class="sm_cat">
					<?php if( have_rows('баннер4') ): ?>
	            	<?php while ( have_rows('баннер4') ) : the_row(); ?>
                                <a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_1">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
					<?php if( have_rows('баннер5') ): ?>
	            	<?php while ( have_rows('баннер5') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_2">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
                            </div>
                            <div class="sm_cat">
					<?php if( have_rows('баннер6') ): ?>
	            	<?php while ( have_rows('баннер6') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_2 shares_cat">
                                    <?php the_sub_field('текст'); ?>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
					<?php if( have_rows('баннер7') ): ?>
	            	<?php while ( have_rows('баннер7') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_1">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
                            </div>
                        </div>
                    </div>
                    <div class="categories">
                        <div class="wrap_sm_cat">
                            <div class="sm_cat">
					<?php if( have_rows('баннер8') ): ?>
	            	<?php while ( have_rows('баннер8') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_2">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
					<?php if( have_rows('баннер9') ): ?>
	            	<?php while ( have_rows('баннер9') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_1">
                                    <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                    <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
                            </div>
					<?php if( have_rows('баннер10') ): ?>
	            	<?php while ( have_rows('баннер10') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="sm_cat_3">
                                <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                                <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
                        </div>
					<?php if( have_rows('баннер11') ): ?>
	            	<?php while ( have_rows('баннер11') ) : the_row(); ?>
					<a href="<?php the_sub_field('ссылка'); ?>" class="big_cat">
                            <img src="<?php the_sub_field('изображение'); ?>" alt="" />
                            <p><?php the_sub_field('текст'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</a>
                    </div>
                </div>
                <div class="footnote">
                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
                            <?php the_content(); // контент ?>
					<?php endwhile; // конец цикла ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); // подключаем footer.php ?>