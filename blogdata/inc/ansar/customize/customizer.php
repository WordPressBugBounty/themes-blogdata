<?php
/**
 * BlogData Theme Customizer
 *
 * @package BlogData
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogdata_customize_register($wp_customize) {

    

    $default = blogdata_get_default_theme_options();

}
add_action('customize_register', 'blogdata_customize_register');