<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'blogdata_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'blogdata_theme_fonts', 1 );
add_action( 'customize_preview_init', 'blogdata_theme_fonts', 1 );

function blogdata_theme_fonts() {
    $url = blogdata_fonts_url();
    if ( $url ) {
        require_once get_theme_file_path( 'inc/ansar/font/wptt-webfont-loader.php' );
        wp_enqueue_style( 'blogdata-theme-fonts', wptt_get_webfont_url( $url ), array(), BLOGDATA_THEME_VERSION );
    }
}

function blogdata_fonts_url() {
    $h = blogdata_get_option( 'heading_fontfamily' );
    $hw = blogdata_get_option( 'heading_fontweight' );
    $m = blogdata_get_option( 'blogdata_menu_fontfamily' );
    $mw = get_theme_mod( 'blogdata_menu_fontweight', '500' );

    return add_query_arg( array(
        'family'  => implode( '|', array_unique( array( "$h:$hw,700", "$m:$mw,400", 'Inter:400,500,700' ) ) ),
        'subset'  => 'latin,latin-ext',
        'display' => 'swap',
    ), 'https://fonts.googleapis.com/css' );
}