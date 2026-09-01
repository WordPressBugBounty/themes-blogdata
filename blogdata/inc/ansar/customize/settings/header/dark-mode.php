<?php
$blogdata_default = blogdata_get_default_theme_options();

Blogdata_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'blogdata_dark_mode_setting',
        'label'     => esc_html__('Dark and Light Mode Switcher', 'blogdata'),
		'section'   => 'header_dark_mode_section',
	)
);
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'blogdata_lite_dark_switcher',
        'label' => esc_html__('Hide/Show', 'blogdata'),
		'section'  => 'header_dark_mode_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);