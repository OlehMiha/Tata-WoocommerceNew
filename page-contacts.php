<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Контакты
 */
get_header(); // подключаем header.php ?>
<?php global $mytheme; ?>
        <div class="content">
            <div class="container">
                <ul class="breadcrumbs">
                    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </ul>
                <div class="wrap_contacts">
                    <h4><?php the_title(); // заголовок поста ?></h4>
                    <ul class="list_contacts">
                        <li class="contacts">
                            <h5>Адрес</h5>
                            <p><?php echo $mytheme['adress']; ?></p>
                        </li>
                        <li class="contacts">
                            <h5>Режим работы</h5>
                            <p><?php echo $mytheme['regim']; ?></p>
                        </li>
                        <li class="contacts">
                            <h5>Контакт-центр</h5>
                            <p><?php echo $mytheme['phone']; ?></p>
                            <p><?php echo $mytheme['phone2']; ?></p>
                            <a href="mailto:<?php echo $mytheme['email']; ?>"><?php echo $mytheme['email']; ?></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="map">
            <div id="ymaps-map-id_4315945" style="width: 100%; height: 100%;"></div><script type="text/javascript">function fid_4315945(ymaps) {var objects = [];var events = {};try{}catch(e){alert(e);};var map; objects["map1"] = map = new ymaps.Map("ymaps-map-id_4315945", {center: [53.9356421359057,27.496372290831598], zoom: 16,type: "yandex#map",behaviors:['scrollZoom','drag','dblClickZoom']});map.controls.add("typeSelector",{"top":4.5,"right":1.5}).add("zoomControl",{"top":172.5,"left":1.5});map.geoObjects.add(objects['Point4'] = new ymaps.Placemark([53.935963569711774,27.494395957008287], {"iconContent":"","balloonContent":"","xname":"Point4","metaType":"Point"},{"preset":"twirl#blueIcon","visible":true,"iconImageHref":"http://a-html.alardo.com.ua/tata/img/pin/map.png","iconImageSize":[64,71],"iconImageOffset":[-10,-40],"iconContentLayout":"twirl#geoObjectIconContent","balloonContentBodyLayout":"twirl#geoObjectBalloonBodyContent","hintContentLayout":"twirl#geoObjectHintContent"})).add(objects[''] = new ymaps.Placemark([53.932822917719626,27.50184467338422], {"iconContent":"","xname":"","metaType":"Point"},{"preset":"twirl#blueStretchyIcon","visible":false,"iconImageHref":"https://api-maps.yandex.ru/2.0.45/release/../images/2c3d90d4e522c1f62b6cf3e59f7a877d.png","iconImageSize":[37,42],"iconImageOffset":[-10,-40],"iconContentLayout":"twirl#geoObjectIconContent","balloonContentBodyLayout":"twirl#geoObjectBalloonBodyContent","hintContentLayout":"twirl#geoObjectHintContent"}));};</script><script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?load=package.full&lang=ru-RU&onload=fid_4315945"></script>
        </div>
        <div class="content">
            <div class="container">
              <div class="form_contacts">
                  <h5>Обратная связь</h5>
                  <?php echo do_shortcode('[contact-form-7 id="91" title="Контакты"]'); ?>
              </div>
            </div>
        </div>
<?php get_footer(); // подключаем footer.php ?>