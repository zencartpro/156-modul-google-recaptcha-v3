<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: loader_google_recaptcha_v3.php 2022-01-02 16:32:29Z webchills $
 */
$loaders[] = array('conditions' => array('pages' => array('*')),
	'jscript_files' => array(
        'jscript_google_recaptcha_v3.php' => 99,
	),
);
