<?php
$blogdata_default = blogdata_get_default_theme_options();

Blogdata_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'menu_sidebar_settings',
        'label'     => esc_html__('Header Toggle Icon', 'blogdata'),
		'section'   => 'header_menu_sidebar_section',
	)
);
// Hide/Show Menu Sidebar
Blogdata_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'blogdata_menu_sidebar',
        'label' => esc_html__('Hide/Show', 'blogdata'),
		'section'  => 'header_menu_sidebar_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
	)
);