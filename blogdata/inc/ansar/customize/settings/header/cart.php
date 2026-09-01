<?php
$blogdata_default = blogdata_get_default_theme_options();

// Cart Icon Section Heading 
Blogdata_Customizer_Control::add_field(
    array(
        'type'      => 'hidden', 
        'settings'  => 'shop_cart_btn_heading',
        'label'     => __('Shopping Cart', 'blogdata'),
        'section'   => 'header_cart_section',
    )
);
// Cart Hide/Show
Blogdata_Customizer_Control::add_field( 
    array(
        'type'     => 'toggle', 
        'settings'  => 'blogdata_cart_enable',
        'label' => __('Hide/Show', 'blogdata'),
        'section'  => 'header_cart_section',
        'default' => true,
        'sanitize_callback' => 'blogdata_sanitize_checkbox',
    )
);