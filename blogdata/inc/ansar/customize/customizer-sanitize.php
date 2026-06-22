<?php
/**
 * Sanitization functions.
 *
 * @package BlogData
 */

if ( ! function_exists( 'blogdata_sanitize_checkbox' ) ) :
    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function blogdata_sanitize_checkbox( $checked ) {
        return ( ( isset( $checked ) && true === $checked ) ? true : false );
    }
endif;

if ( ! function_exists( 'blogdata_sanitize_select' ) ) :
    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function blogdata_sanitize_select( $input, $setting ) {
        // Ensure input is a slug.
        $input = sanitize_text_field( $input );
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

if ( ! function_exists( 'blogdata_sanitize_number_range' ) ) :
    /**
     * Sanitize number range.
     *
     * @since 1.0.0
     *
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     *
     * @param int                  $input Number to check within the numeric range defined by the setting.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
     */
    function blogdata_sanitize_number_range( $input, $setting ) {
        // Ensure input is an absolute integer.
        $input = absint( $input );
        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;
        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );
        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );
        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );
    }
endif;


/**
 * Alpha Color (Hex, RGB & RGBa) sanitization
 *
 * @param  string	Input to be sanitized
 * @return string	Sanitized input
 */
if ( ! function_exists( 'blogdata_sanitize_alpha_color' ) ) :
    function blogdata_sanitize_alpha_color( $value ) {
        // Check if the value is a valid hexadecimal color
        if ( preg_match( '/^#([a-f0-9]{3}){1,2}$/i', $value ) ) {
            return sanitize_hex_color( $value );
        }
        // Check if the value is a valid RGB color
        if ( preg_match( '/^rgb\((\d{1,3}),(\d{1,3}),(\d{1,3})\)$/i', $value, $matches ) ) {
            $red = intval( $matches[1] );
            $green = intval( $matches[2] );
            $blue = intval( $matches[3] );
            return "rgb($red, $green, $blue)";
        }
        // Check if the value is a valid RGBA color
        if ( preg_match( '/^rgba\((\d{1,3}),(\d{1,3}),(\d{1,3}),([\d\.]+)\)$/i', $value, $matches ) ) {
            $red = intval( $matches[1] );
            $green = intval( $matches[2] );
            $blue = intval( $matches[3] );
            $alpha = floatval( $matches[4] );
            // Ensure alpha value is between 0 and 1
            $alpha = max( 0, min( 1, $alpha ) );
            return "rgba($red, $green, $blue, $alpha)";
        }
        // If none of the above formats match, return a default value
        return '';
    }
endif;

/**
 * Sanitize values for range inputs.
 *
 * @param string $input Control input.
 */
function blogdata_sanitize_range_value( $input ) {
	if ( blogdata_is_json( $input ) ) {
		$range_value            = json_decode( $input, true );
		$range_value['desktop'] = ! empty( $range_value['desktop'] ) || $range_value['desktop'] === '0' ? floatval( $range_value['desktop'] ) : '';
		$range_value['tablet']  = ! empty( $range_value['tablet'] ) || $range_value['tablet'] === '0' ? floatval( $range_value['tablet'] ) : '';
		$range_value['mobile']  = ! empty( $range_value['mobile'] ) || $range_value['mobile'] === '0' ? floatval( $range_value['mobile'] ) : '';
		return json_encode( $range_value );
	}
	return floatval( $input );
}
