<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.google_recaptcha_v3.php 2022-01-02 16:32:29Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
 die('Illegal Access');
}

$autoLoadConfig[190][] = array('autoType'=>'class',
                               'loadFile'=>'google_recaptcha_v3.php');
$autoLoadConfig[190][] = array('autoType'=>'classInstantiate',
                               'className'=>'GoogleRecaptchaV3',
                               'objectName'=>'googleRecaptcha');

$autoLoadConfig[191][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.google_recaptcha_v3.php');
$autoLoadConfig[191][] = array('autoType'=>'classInstantiate',
                              'className'=>'GoogleRecaptchaV3Observer',
                              'objectName'=>'googleRecaptchaObserver');
