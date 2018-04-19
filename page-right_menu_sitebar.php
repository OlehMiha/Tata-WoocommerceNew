<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
  * Template Name: Меню с правой стороны
 */
get_header(); // подключаем header.php ?>
<div class="content">
    <div class="container">
        <ul class="breadcrumbs">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </ul>
        <h4><?php the_title(); // заголовок поста ?></h4>
        <div class="wrap_textpage">
            <ul class="list_menu">
                <?php wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'pagesidebar',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => '',
                ) ); ?>
            </ul>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
            <div class="textpage">
                <div class="item_textpage">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; // конец цикла ?>
        </div>
    </div>
</div>
<?php get_footer(); // подключаем footer.php ?>