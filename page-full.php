<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
  * Template Name: Полная ширина
 */
get_header(); // подключаем header.php ?>
        <div class="content">
            <div class="container">

				<ul class="breadcrumbs">
			        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			    </ul>
                <h4><?php the_title(); // заголовок поста ?></h4>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
                            <?php the_content(); // контент ?>
					<?php endwhile; // конец цикла ?>
            </div>
        </div>
<?php get_footer(); // подключаем footer.php ?>