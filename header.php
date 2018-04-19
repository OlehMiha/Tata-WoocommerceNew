<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- !!!Noindex!!! -->
<meta name="robots" content="noindex" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="overlay"></div>
    <div class="wrap_mob_nav">
        <button class="close_mob_nav"></button>
        <form method="get" class="search" action="<?php echo home_url( '/' ); ?>">
            <input type="search" class="tp_inp" data-swplive="true" id="search" name="s" placeholder="Умный поиск" />
            <input type="submit" class="loupe" value="" />
        </form>

        <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
        <?php get_template_part( 'template-parts/navigation/navigation', 'header' ); ?>


        <?php global $mytheme; ?>
        <div class="ftr_mobnav">
            <div class="working_call"><?php echo $mytheme['regim']; ?></div>
            <div class="phone">
                <?php
                    $vowels = array(" ", "-");
                    $phone_1 = str_replace($vowels, "", $mytheme['phone']);
                    $phone_2 = str_replace($vowels, "", $mytheme['phone2']);
                ?>
                <a href="tel:<?php echo $phone_1; ?>"><span><?php echo substr($mytheme['phone'], 0, 7);?></span><?php echo substr($mytheme['phone'], 7);?></a>
                <a href="tel:<?php echo $phone_2; ?>"><span><?php echo substr($mytheme['phone2'], 0, 7);?></span><?php echo substr($mytheme['phone2'], 7);?></a>
            </div>
        </div>
    </div>

<div class="wrapper">
    <div class="wrap_content">
        <div class="top_header">
            <div class="container">
                <?php get_template_part( 'template-parts/navigation/navigation', 'header' ); ?>

                <div class="working_call"><?php echo $mytheme['regim']; ?></div>
                <a data-fancybox data-src="#modal_call" href="#" class="back_call">Обратный звонок</a>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <button class="open_mob_nav"></button>
                <a href="/" class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" /></a>
                <form method="get" class="search" action="<?php echo home_url( '/' ); ?>">
                    <input type="search" class="tp_inp" data-swplive="true" id="search" name="s" placeholder="Умный поиск" />
                    <input type="submit" class="loupe" value="" />
                </form>
                <div class="phone">
                    <a href="tel:<?php echo $phone_1; ?>"><span><?php echo substr($mytheme['phone'], 0, 7);?></span><?php echo substr($mytheme['phone'], 7);?></a>
                    <a href="tel:<?php echo $phone_2; ?>"><span><?php echo substr($mytheme['phone2'], 0, 7);?></span><?php echo substr($mytheme['phone2'], 7);?></a>

                </div>
                <div class="basket">
                    <p>Корзина
                        <span>
                            <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                            
                        </span>
                    </p>
                    <a href="/cart/">Оформить заказ</a>
                </div>
            </div>
        </div>
        <div class="wrap_nav">
            <div class="container">
                <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            </div>
        </div>
