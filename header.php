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
        
		<?php echo do_shortcode('[wcas-search-form]') ?>

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
				<!--
                <form method="get" class="search" action="<?php echo home_url( '/' ); ?>">
                    <input type="search" class="tp_inp" data-swplive="true" id="search" name="s" placeholder="Умный поиск" />
                    <input type="submit" class="loupe" value="" />
                </form>
				-->
				<?php echo do_shortcode('[wcas-search-form]') ?>
				<style>
				.dgwt-wcas-search-wrapp {
					position: relative;
					display: inline-block;
					color: #444;
					min-width: auto;
					max-width: none;;
					text-align: left;
					width: 420px;
					margin-left: 65px;
					margin-top: 24px;
					float: left;
				}
				.dgwt-wcas-ico-loupe {
					fill: #1c1c1c;
				}
				.dgwt-wcas-sf-wrapp button.dgwt-wcas-search-submit {
					background: transparent;
				}
				.dgwt-wcas-ico-loupe {
					right: 0px;
					height: 50%;
					padding: 1px;
					width: 54px;
					stroke: #1c1c1c;
					stroke-width: 3px;
				}
				.dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit:before {
					display: none;
				}
				.dgwt-wcas-sf-wrapp {
					-webkit-border-radius: 4px;
					border-radius: 4px;
				}
				.dgwt-wcas-sf-wrapp input[type="search"].dgwt-wcas-search-input {
					-webkit-border-radius: 4px;
					border-radius: 4px;
				}
				.dgwt-wcas-has-img .dgwt-wcas-sp, .dgwt-wcas-has-desc .dgwt-wcas-sp {
					top: 0px;
				}
				.dgwt-wcas-preloader {
					right: 30px!important;
				}
				@media (max-width: 889px){
					.header .dgwt-wcas-search-wrapp.woocommerce {
						display: none;
					}
					.wrap_mob_nav .dgwt-wcas-search-wrapp.woocommerce {
						display: inline-block;
					}
					.dgwt-wcas-search-wrapp {
						width: calc(100% - 24px);
						margin-left: 12px;
						margin-top: 0px;
						margin-bottom: 10px;
					}
				}
				</style>
				
				
				
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
