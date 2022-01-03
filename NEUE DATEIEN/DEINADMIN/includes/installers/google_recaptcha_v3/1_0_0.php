<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 1_0_0.php 2022-01-02 22:15:29Z webchills $
 */
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'GoogleRecaptchaV3'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES
('Google reCaptcha V3 - Enable?', 'GOOGLE_RECAPTCHA_V3_ENABLE', 'false', 'Set to true to activate Google reCaptcha V3', @gid, 1, NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Google reCaptcha V3 - Site Key', 'GOOGLE_RECAPTCHA_V3_SITE_KEY', '', 'Enter your Google reCaptcha V3 site key here.', @gid, 2, NOW(), NULL, NULL),
('Google reCaptcha V3 - Secret Key', 'GOOGLE_RECAPTCHA_V3_SECRET_KEY', '', 'Enter your Google reCaptcha V3 secret key here', @gid, 3, NOW(), NULL, NULL),
('Google reCaptcha V3 - Minimum Score per action', 'GOOGLE_RECAPTCHA_V3_ACTIONS_MIN_SCORE', 'default=0.5', 'Minimum score per action require to allow request. Score must be from 0.0 to 1.0.<br/>Use following format separating different actions by comma:<br/> action1_name=action1_min_score, action2_name=action2_min_score.<br/>Eg.: default=0.5,homepage=0.5,cart=0.65.<br/><br/><b>Note: </b>For undefined actions, action \"default\" will be considered. If not defined score for action \"default\", 0.5 will be used.<br/><br/>', @gid, 4, NOW(), NULL, NULL),
('Google reCaptcha V3 - Actions per form', 'GOOGLE_RECAPTCHA_V3_FORM_ACTIONS', 'contact_us=default, create_account=default, product_reviews_write=default, no_account=default', 'Set here the actions that should be used by each HTML form.<br/>Use following format separating different forms by comma: form_name=action,form2_name=action.<br/>Eg.: contact_us=default, checkout_confirmation=cart<br/><br/><b>Note: </b>If no action is provided, action \"default\" will be used.<br/><br/>', @gid, 5, NOW(), NULL, NULL);");

$db->Execute("REPLACE INTO ".TABLE_CONFIGURATION_LANGUAGE." (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Google reCaptcha V3 - Aktivieren?', 'GOOGLE_RECAPTCHA_V3_ENABLE', 'Stellen Sie auf true, wenn Sie Google reCaptcha V3 aktivieren wollen.', 43),
('Google reCaptcha V3 - Website Schlüssel', 'GOOGLE_RECAPTCHA_V3_SITE_KEY', 'Geben Sie hier Ihren Google reCaptcha V3 Website Schlüssel ein.', 43),
('Google reCaptcha V3 - Geheimer Schlüssel', 'GOOGLE_RECAPTCHA_V3_SECRET_KEY', 'Geben Sie hier Ihren Google reCaptcha V3 Geheimen Schlüssel ein.', 43),
('Google reCaptcha V3 - Minimum Score je Aktion', 'GOOGLE_RECAPTCHA_V3_ACTIONS_MIN_SCORE', 'Hinweis: Um reCaptcha auf den Seiten Kontakt, Artikelbewertung schreiben und Registrierung zu nutzen, lassen Sie diese Einstellungen genauso wie sie bereits voreingestellt sind!<br/><br/>Mindestpunktzahl pro Aktion, die erforderlich ist, um eine Anfrage zuzulassen. Die Punktzahl muss zwischen 0.0 und 1.0 liegen.<br/>Verwenden Sie folgendes Format, um verschiedene Aktionen durch Komma zu trennen:<br/> action1_name=action1_min_score, action2_name=action2_min_score.<br/>Beispiel: default=0.5,homepage=0.5,cart=0.65<br/><br/><b>Hinweis: </b>Für nicht definierte Aktionen wird action \"default\" berücksichtigt. Wenn für Aktion \"default\" kein Wert definiert ist, wird 0.5 verwendet.<br/><br/>', 43),
('Google reCaptcha V3 - Aktion je Formularseite', 'GOOGLE_RECAPTCHA_V3_FORM_ACTIONS','Hinweis: Um reCaptcha auf den Seiten Kontakt, Artikelbewertung schreiben und Registrierung zu nutzen, lassen Sie diese Einstellungen genauso wie sie bereits voreingestellt sind!<br/><br/>Legen Sie hier die Aktionen fest, die von jedem HTML-Formular verwendet werden sollen.<br/> Verwenden Sie das folgende Format, indem Sie verschiedene Formulare durch ein Komma trennen: form_name=action,form2_name=action<br/>Bsp.: contact_us=default, checkout_confirmation=cart<br/><br/><b>Hinweis: </b>Wenn keine Aktion angegeben wird, wird action \"default\" verwendet.<br/><br/>', 43)");

$admin_page = 'configGoogleRecaptchaV3';
// delete configuration menu
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
// add configuration menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'GoogleRecaptchaV3'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configGoogleRecaptchaV3','BOX_GOOGLE_RECAPTCHA_V3','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
$messageStack->add('Google reCaptcha V3 Konfiguration erfolgreich hinzugefügt.', 'success');  
}

