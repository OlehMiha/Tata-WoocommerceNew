<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area content">
        <div id="main" class="site-main container" role="main">
            <div class="wrap_404">
                <div class="img_404">
                    <p>4 <img src="<?php bloginfo('template_url'); ?>/img/404.png" alt=""> 4</p>
                </div>
                <div class="txt_404">
                    <h5>Страница не найдена</h5>
                    <p>Данной страницы не существует. Для старта покупок, зайдите в <a href="/shop/"> Каталог</a> нашего интернет-магазина. Ассортимент товаров для кровли и строительства весьма широк.</p>
                    <a href="/shop/" class="blue_btn">Перейти в каталог</a>
                </div>
            </div>
		</div><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
