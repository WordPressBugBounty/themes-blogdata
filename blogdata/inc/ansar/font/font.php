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
    $fonts = array(
        'Inter' => array( '400', '500', '700' ),
    );

    $heading_font   = blogdata_get_option( 'heading_fontfamily' );
    $heading_weight = blogdata_get_option( 'heading_fontweight' );
    $menu_font      = blogdata_get_option( 'blogdata_menu_fontfamily' );
    $menu_weight    = get_theme_mod( 'blogdata_menu_fontweight', '500' );

    foreach ( array( $heading_font => $heading_weight, $menu_font => $menu_weight ) as $font => $weight ) {
        $font = trim( explode( ',', $font )[0] );

        if ( $font ) {
            $fonts[ $font ][] = $weight ?: '400';
        }
    }

    $families = array();

    foreach ( $fonts as $font => $weights ) {
        $families[] = 'family=' . rawurlencode(
            $font . ':wght@' . implode( ';', array_unique( $weights ) )
        );
    }

    return 'https://fonts.googleapis.com/css2?' . implode( '&', $families ) . '&display=swap';
}