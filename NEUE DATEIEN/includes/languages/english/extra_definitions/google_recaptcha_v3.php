<?php
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: .google_recaptcha_v3.php 2022-01-02 16:32:29Z webchills $
 */
 
//returned by recaptcha api
define('RECAPTCHA_V3_MISSING_INPUT_SECRET', 'The secret parameter is missing.');
define('RECAPTCHA_V3_INVALID_INPUT_SECRET', 'The secret parameter is invalid or malformed.');
define('RECAPTCHA_V3_MISSING_INPUT_RESPONSE', 'The response parameter is missing.');
define('RECAPTCHA_V3_INVALID_INPUT_RESPONSE', 'The response parameter is invalid or malformed.');
define('RECAPTCHA_V3_BAD_REQUEST', 'The request is invalid or malformed.');
define('RECAPTCHA_V3_TIMEOUT_OR_DUPLICATE', 'The response is no longer valid: either is too old or has been used previously.');

//custom when trying to connect to api
define('RECAPTCHA_V3_VALIDATION_CONNECTION_ERROR', 'Failed to connect with reCaptcha API to validate the request. Please try again.');
define('RECAPTCHA_V3_RECAPTCHA_DISABLED', 'ReCaptcha plugin is disabled.');

//other messages
define('RECAPTCHA_V3_MISSING_API_KEYS', 'Failed to enable reCaptcha. Missing API keys.');
define('RECAPTCHA_V3_LOW_SCORE', 'You are not authorized to send this request at this time. Minimum reCaptcha score required to this request is %s. Your score is %s');