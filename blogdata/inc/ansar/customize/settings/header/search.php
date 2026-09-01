<?php
$blogdata_default = blogdata_get_default_theme_options();

Blogdata_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'blogdata_search_icon_setting',
        'label'     => esc_html__('Search', 'blogdata'),
		'section'   => 'header_search_section',
	)
);
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'blogdata_menu_search',
        'label' => esc_html__('Hide/Show', 'blogdata'),
		'section'  => 'header_search_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);