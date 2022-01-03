<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: class.google_recaptcha_v3.php 2022-01-02 16:32:29Z webchills $
 */
/**
 * Observer class used to verify request token upon requests
 *
 */
class GoogleRecaptchaV3Observer extends base 
{
    function GoogleRecaptchaV3Observer() {
        global $zco_notifier, $googleRecaptcha;
        
        $zco_notifier->attach($this, $googleRecaptcha->get_notifiers_to_check());
    }
	
    function update(&$class, $eventID, $paramsArray) {
        global $error, $googleRecaptcha;
        
        if(!$googleRecaptcha->is_enable()) return $error;
        
        $valid = false;
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
            $valid = $googleRecaptcha->validate_recaptcha($_POST['g-recaptcha-response'], $googleRecaptcha->get_notifier_message_class($eventID));
        }
        
        if(!$valid) $error = true;
        
        return $error;
    }
}
