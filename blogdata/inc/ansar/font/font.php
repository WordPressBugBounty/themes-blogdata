<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'blogdata_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'blogdata_theme_fonts', 1 );

function blogdata_theme_fonts() {
    $url = blogdata_fonts_url();
    if ( $url ) {
        require_once get_theme_file_path( 'inc/ansar/font/wptt-webfont-loader.php' );
        wp_enqueue_style( 'blogdata-theme-fonts', wptt_get_webfont_url( $url ), array(), BLOGDATA_THEME_VERSION );
    }
}

function blogdata_fonts_url() {
    $fonts = array( 'Inter' => array( 400, 500, 700 ) );

    $requested = array(
        array( blogdata_get_option( 'heading_fontfamily' ), blogdata_get_option( 'heading_fontweight' ) ),
        array( blogdata_get_option( 'blogdata_menu_fontfamily' ), get_theme_mod( 'blogdata_menu_fontweight', '500' ) ),
    );

    foreach ( $requested as list( $font, $weight ) ) {
        $font   = trim( explode( ',', (string) $font )[0], " \t\n\r\0\x0B'\"" );
        $weight = absint( $weight ) ?: 400;

        if ( $font && $weight >= 100 && $weight <= 900 ) {
            $fonts[ $font ][] = $weight;
        }
    }

    $fonts = apply_filters( 'blogdata_google_fonts', $fonts );
    ksort( $fonts );

    $families = array();

    foreach ( $fonts as $font => $weights ) {
        $weights = array_unique( array_filter( array_map( 'absint', (array) $weights ) ) );
        sort( $weights, SORT_NUMERIC );

        if ( $font && $weights ) {
            $families[] = 'family=' . urlencode( $font ) . ':wght@' . implode( ';', $weights );
        }
    }

    return $families ? 'https://fonts.googleapis.com/css2?' . implode( '&', $families ) . '&display=swap' : '';
}