<?php
$blogdata_default = blogdata_get_default_theme_options();

// Enable/Disable header image overlay color
Blogdata_Customizer_Control::add_field( 
    array(
        'type'     => 'checkbox', 
        'settings'  => 'remove_header_image_overlay',
        'label' => esc_html__('Remove Overlay Color', 'blogdata'),
        'section'  => 'header_image',
        'default' => false,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
    )
);
Blogdata_Customizer_Control::add_field( 
    array(
        'type'     => 'color-alpha', 
        'settings'  => 'blogdata_header_overlay_color',
        'label' => esc_html__('Background Color', 'blogdata'),
        'section'  => 'header_image',
        'default' => '',
        'sanitize_callback' => 'blogdata_sanitize_alpha_color',
        'active_callback'   => function( $setting ) {
            if ( $setting->manager->get_setting( 'remove_header_image_overlay' )->value() == false ) {
                return true;
            }
            return false;
        }
    )
);
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'blogdata-range', 
        'settings'  => 'header_image_height',
        'label' => esc_html__('Height', 'blogdata'),
		'section'  => 'header_image',
        'transport'         => 'postMessage',
        'media_query'   => true,
        'input_attr'    => array(
            'mobile'  => array('min' => 0,'max' => 300,'step' => 1,'default_value' => 130,),
            'tablet'  => array('min' => 0,'max' => 400,'step' => 1,'default_value' => 150,),
            'desktop' => array('min' => 0,'max' => 500,'step' => 1,'default_value' => 200,),
        ),
    ),
);