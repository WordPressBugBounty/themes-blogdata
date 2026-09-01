<?php
$blogdata_default = blogdata_get_default_theme_options();

// Sticky 
Blogdata_Customizer_Control::add_field(
    array(
        'type'     => 'hidden', 
        'settings'  => 'sticky_header_heading',
        'label' => esc_html__('Sticky Header', 'blogdata'),
        'section'  => 'sticky_header',
        'sanitize_callback' => 'blogdata_sanitize_text',
    )
);
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'sticky_header_toggle',
        'label' => esc_html__('Enable/Disable', 'blogdata'),
		'section'  => 'sticky_header',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);