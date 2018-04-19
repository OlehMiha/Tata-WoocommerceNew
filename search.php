<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

            <ul class="breadcrumbs">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </ul>
            <header class="page-header search-header">
                <?php if ( have_posts() ) : ?>
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php else : ?>
                    <h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
                <?php endif; ?>
            </header><!-- .page-header -->

            <?php
            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked wc_print_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action( 'woocommerce_before_shop_loop' );

            ?>
            <?php

            woocommerce_product_loop_start();
            while ( have_posts() ) : the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 *
                 * @hooked WC_Structured_Data::generate_product_data() - 10
                 */
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'product' );



            endwhile; // End of the loop.
            woocommerce_product_loop_end();
            do_action( 'woocommerce_after_shop_loop' );
            ?>


        </div><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
