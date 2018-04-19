<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div class="footer">
    <div class="container">
        <div class="left_ftr">
            <a href="/" class="logo_ftr"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" /></a>
            <div class="copyrighted"><?php echo $mytheme['copy']; ?></div>
        </div>
        <div class="catalog_nav">
            <h5>Каталог</h5>
            <ul>
                <?php wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'footer1',
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
            <ul>
                <?php wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'footer2',
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
        </div>
        <div class="service_nav">
            <h5>Сервис</h5>
            <ul>
                <?php wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'topheader',
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
        </div><?php global $mytheme; ?>
        <div class="right_ftr">
            <h5>Контакт-центр</h5>
            <div class="phone_ftr">
                <?php
                $vowels = array(" ", "-");
                $phone_1 = str_replace($vowels, "", $mytheme['phone']);
                $phone_2 = str_replace($vowels, "", $mytheme['phone2']);
                ?>
                <a href="tel:<?php echo $phone_1; ?>"><?php echo $mytheme['phone']; ?></a>
                <a href="tel:<?php echo $phone_2; ?>"><?php echo $mytheme['phone2']; ?></a>
            </div>
            <a href="mailto:<?php echo $mytheme['email']; ?>" class="mail"><?php echo $mytheme['email']; ?></a>
            <div class="working_hours">
                <p>
                    <b>Режим работы: </b>
                    <?php echo $mytheme['regim']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal" id="modal_call">
    <h5>Заказать обратный звонок</h5>
    <?php echo do_shortcode('[contact-form-7 id="90" title="Звонок"]'); ?>
</div>

<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>

</body>
</html>
