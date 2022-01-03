<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: recaptcha_validation.php 2022-01-02 16:32:29Z webchills $
 */
require('../includes/configure.php');
ini_set('include_path', DIR_FS_CATALOG . PATH_SEPARATOR . ini_get('include_path'));
chdir(DIR_FS_CATALOG);
require_once('includes/application_top.php');

if (!isset($nmxRecaptcha)) {
    echo json_encode(['success' => true]);
    exit();
}

if(!$nmxRecaptcha->is_enable()){
    echo json_encode(['success' => true]);
    exit();
}

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    $valid = $nmxRecaptcha->validate_recaptcha($_POST['g-recaptcha-response']);
    if($valid) echo json_encode(['success' => true]);
}

$error_messages = array();

if(isset($messageStack) && is_array($messageStack->messages)){
    for ($i=0, $n=count($messageStack->messages); $i<$n; $i++) {
        if ($messageStack->messages[$i]['class'] == 'recaptcha') {
            $error_messages[] = $messageStack->messages[$i];
        }
    }
}
$error_messages = array_values(array_unique($error_messages));

echo json_encode(['success' => false, 'errors' => $error_messages]);
exit();