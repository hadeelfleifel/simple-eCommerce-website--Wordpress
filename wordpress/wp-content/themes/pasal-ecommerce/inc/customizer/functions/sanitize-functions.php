<?php
/**
 * Theme Customizer Functions
 *
 * @package Pasal-ecommerce
 * @since Pasal Ecommerce 1.0
 */
/********************* Pasal Ecommerce CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function pasal_ecommerce_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function pasal_ecommerce_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function pasal_ecommerce_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function pasal_ecommerce_sanitize_custom_css( $input ) {
	if ( $input != '' ) {
		$input = str_replace( '<=', '&lt;=', $input );
		$input = wp_kses_split( $input, array(), array() );
		$input = str_replace( '&gt;', '>', $input );
		$input = strip_tags( $input );
		return $input;
	}
	else {
		return '';
	}
}
function pasal_ecommerce_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}
function pasal_ecommerce_reset_alls( $input ) {
	 if ( $input == 1 ) {
        delete_option( 'pasal_ecommerce_theme_options');
        $input=0;
        return $input;
    }
    else {
        return '';
    }
}

if(!function_exists('pasal_ecommerce_sanitize_checkbox')):
    function pasal_ecommerce_sanitize_checkbox( $input ) {
        return $input;
    }
endif;

