jQuery( document ).ready(function() {
	 jQuery(document).on('click', '#customize-control-pasal_ecommerce_theme_options-pasal_ecommerce_product_cat_lists select>option', function(e) {

            if(jQuery(this).hasClass('cat_selected')){
                jQuery(this).removeClass('cat_selected');
            }
            else {
                jQuery(this).addClass('cat_selected');
            }
            var last_valid_selection = null;
            jQuery('#customize-control-pasal_ecommerce_theme_options-pasal_ecommerce_product_cat_lists select').change(function(event) {
                if (jQuery(this).val().length > 4) {
                    alert('Please select up to four categories only');
                    jQuery(this).val(last_valid_selection);
                    jQuery(this).find('option').removeAttr('selected');
                } else {
                    last_valid_selection = jQuery(this).val();
                }
            });
        });

});