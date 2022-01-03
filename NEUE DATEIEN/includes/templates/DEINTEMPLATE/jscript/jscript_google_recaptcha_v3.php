<?php 
/**
 * @package Google reCaptcha V3 for Zen Cart German
 * @copyright Copyright 2021 Numinix (www.numinix.com)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at 
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: jscript_google_recaptcha_v3.php 2022-01-03 15:57:29Z webchills $
 */
global $googleRecaptcha;
if(isset($googleRecaptcha) && $googleRecaptcha->is_enable()):
?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $googleRecaptcha->get_site_key();?>"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){
    grecaptcha.ready(function() {
    	submitForm = null;
        jQuery('form').each(
            function(index, el){
                form = jQuery(el);
                actionsArray = JSON.parse('<?php echo $googleRecaptcha->get_form_actions_as_json();?>');
				if(form.attr('name') in actionsArray){
					form.data('recaptcha-action', actionsArray[form.attr('name')]);
				}else{
					//doesn't add recaptcha event if form is not defined on the config
					return;
				}

				form.submit(function(e){
					submitForm = jQuery(this);
					recaptchaResponse = submitForm.find('input[name="g-recaptcha-response"]');
					if(recaptchaResponse.length == 0){
						e.stopImmediatePropagation();
						e.preventDefault();
						submitted = false;
						grecaptcha.execute('<?php echo $googleRecaptcha->get_site_key();?>', {action: submitForm.data('recaptcha-action')})
							.then(function(response){
								submitForm.append('<input type="hidden" name="g-recaptcha-response" value="'+response+'" />');
								if(typeof checkForm === 'function'){
									if(checkForm(submitForm.attr('name'))){
										submitted = false;
										submitForm.submit();
									}
								}else{
									submitForm.submit();
								}
							});
						return false;
					}
					return true;
				});
            }
        );
    });
});
</script>
<?php endif; ?>