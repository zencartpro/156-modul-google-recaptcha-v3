<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: google_recaptcha_v3.php 2022-01-02 16:32:29Z webchills $
 */

//returned by recaptcha api
define('RECAPTCHA_V3_MISSING_INPUT_SECRET', 'Es fehlt der Parameter secret.');
define('RECAPTCHA_V3_INVALID_INPUT_SECRET', 'Der Parameter secret ist ungültig oder in falschem Format.');
define('RECAPTCHA_V3_MISSING_INPUT_RESPONSE', 'Es fehlt der Parameter response.');
define('RECAPTCHA_V3_INVALID_INPUT_RESPONSE', 'Der Parameter response ist ungültig oder in falschem Format.');
define('RECAPTCHA_V3_BAD_REQUEST', 'Die Anfrage ist ungültig oder in falschem Format.');
define('RECAPTCHA_V3_TIMEOUT_OR_DUPLICATE', 'Die Antwort ist nicht mehr gültig: Sie ist entweder zu alt oder wurde bereits verwendet.');

//custom when trying to connect to api
define('RECAPTCHA_V3_VALIDATION_CONNECTION_ERROR', 'Die Verbindung mit der reCaptcha-API zur Validierung der Anfrage konnte nicht hergestellt werden. Bitte versuchen Sie es erneut.');
define('RECAPTCHA_V3_RECAPTCHA_DISABLED', 'ReCaptcha Modul ist deaktiviert');

//other messages
define('RECAPTCHA_V3_MISSING_API_KEYS', 'Konnte reCaptcha Modul nicht akltivieren. Fehlende API Keys.');
define('RECAPTCHA_V3_LOW_SCORE', 'Sie sind zu diesem Zeitpunkt nicht berechtigt, diese Anfrage zu senden. Die für diese Anfrage erforderliche reCaptcha-Mindestpunktzahl ist %s. Ihr Ergebnis ist %s');