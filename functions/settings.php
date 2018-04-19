<?php
class ControlPanel {
// Устанавливаем значения по умолчанию
var $default_settings = array(

 );
 var $options;

 function ControlPanel() {
 add_action('admin_menu', array(&$this, 'add_menu'));
 if (!is_array(get_option('themadmin')))
 add_option('themadmin', $this->default_settings);
 $this->options = get_option('themadmin');
 }

 function add_menu() {
 add_theme_page('WP Theme Options', 'Опции темы', 8, "themadmin", array(&$this, 'optionsmenu'));
 }

 // Сохраняем значения формы с настройками 
 function optionsmenu() {
 if ($_POST['ss_action'] == 'save') {
 $this->options["adress"] = $_POST['cp_adress'];
 $this->options["phone"] = $_POST['cp_phone'];
 $this->options["phone2"] = $_POST['cp_phone2'];
 $this->options["email"] = $_POST['cp_email'];
 $this->options["regim"] = $_POST['cp_regim'];
 $this->options["copy"] = $_POST['cp_copy'];
 update_option('themadmin', $this->options);
 echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 400px; margin-left: 17px; margin-top: 17px;"><p>Ваши изменения <strong>сохранены</strong>.</p></div>';
 }
 // Создаем форму для настроек
 echo '<form action="" method="post" class="themeform">';
 echo '<input type="hidden" id="ss_action" name="ss_action" value="save">';

 print '<div class="cptab"><br />
 <b>Настройки темы</b>
 <br />

 <p><input placeholder="Адрес" style="width:400px;" name="cp_adress" id="cp_adress" value="'.$this->options["adress"].'"><label> - адрес</label></p>
 <p><input placeholder="Телефон" style="width:400px;" name="cp_phone" id="cp_phone" value="'.$this->options["phone"].'"><label> - телефон</label></p>
 <p><input placeholder="Телефон 2" style="width:400px;" name="cp_phone2" id="cp_phone2" value="'.$this->options["phone2"].'"><label> - телефон 2</label></p>
 <p><input placeholder="Email" style="width:400px;" name="cp_email" id="cp_email" value="'.$this->options["email"].'"><label> - email</label></p>
 <p><input placeholder="Режим работы" style="width:400px;" name="cp_regim" id="cp_regim" value="'.$this->options["regim"].'"><label> - режим работы</label></p>
 <p><input placeholder="Копирайт" style="width:400px;" name="cp_copy" id="cp_copy" value="'.$this->options["copy"].'"><label> - копирайт</label></p>

 </div><br />';
 echo '<input type="submit" value="Сохранить" name="cp_save" class="dochanges" />';
 echo '</form>';
 }
}
$cpanel = new ControlPanel();
$mytheme = get_option('themadmin');
?>