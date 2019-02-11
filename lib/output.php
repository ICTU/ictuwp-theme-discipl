<?php
/**
 * discipl.org WP theme (2019).
 *
 * This file adds the required CSS to the front end to the ICTU Theme discipl.org (2019) theme.
 *
 * @package discipl-2019
 * @author  StudioPress / Paul van Buuren
 * @license GPL-2.0+
 * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */

add_action( 'wp_enqueue_scripts', 'author_css' );
/**
 * Checks the settings for the accent color, highlight color, and header.
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 1.0.0
 */
function author_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$header_color = get_background_color() == '' ? author_customizer_get_default_header_color() : '#' . get_background_color();
	$light_color  = get_theme_mod( 'author_light_color', author_customizer_get_default_light_color() );
	$dark_color   = get_theme_mod( 'author_dark_color', author_customizer_get_default_dark_color() );
	$accent_color = get_theme_mod( 'author_accent_color', author_customizer_get_default_accent_color() );

	$css = '';

	$css .= ( author_customizer_get_default_header_color() !== $header_color ) ? sprintf( '


		.genesis-nav-menu a,
		.genesis-nav-menu > .current-menu-item > a,
		.nav-primary:hover .genesis-nav-menu > li > a:focus,
		.nav-primary:hover .genesis-nav-menu > li > a:hover,
		.site-header,
		.site-title a,
		.site-title a:focus,
		.site-title a:hover {
			color: %2$s;
		}

		.nav-primary:hover .genesis-nav-menu > li > a {
			color: %3$s;
		}
		', author_color_contrast( $header_color ), author_change_brightness( $header_color ) ) : '';


	$css .= ( author_customizer_get_default_light_color() !== $light_color ) ? sprintf( '

		blockquote::before {
			color: %1$s;
		}

		.content .widget-full .featuredpost,
		.nav-secondary,
		.sidebar,
		.sidebar .widget {
			background-color: %1$s;
			color: %2$s;
		}

		.nav-secondary .genesis-nav-menu > li > a {
			color: %2$s;
		}
		', $light_color, author_color_contrast( $light_color ), author_change_brightness( $light_color ) ) : '';

	$css .= ( author_customizer_get_default_dark_color() !== $dark_color ) ? sprintf( '

		hr {
			border-color: %2$s;
		}

		.content .widget-full .featuredpage,
		.footer-widgets .wrap,
		.site-footer .wrap,
		.widget-full .featured-content .widget-title {
			background-color: %1$s;
			color: %2$s;
		}

		@media only screen and ( min-width: 981px ) {
			.genesis-nav-menu .sub-menu,
			.genesis-nav-menu .sub-menu li a,
			.nav-primary:hover .sub-menu li a,
			.nav-secondary .genesis-nav-menu .current-menu-item > a,
			.nav-secondary .genesis-nav-menu .sub-menu .current-menu-item > a:hover,
			.nav-secondary .genesis-nav-menu .sub-menu a,
			.nav-secondary .genesis-nav-menu a:hover {
				background-color: %1$s;
				color: %2$s;
			}

			.nav-primary:hover .sub-menu li a:focus,
			.nav-primary:hover .sub-menu li a:hover {
				color: %2$s;
			}
		}

		.footer-widgets .widget-title,
		.footer-widgets .wrap a,
		.site-footer .wrap a,
		.content .widget-full .featuredpage a:focus,
		.content .widget-full .featuredpage a:hover,
		.content .widget-full .featuredpage .entry-title a,
		.content .widget-full .featuredpage .more-link {
			color: %2$s;
		}

		.content .widget-full .featuredpage .more-link {
			border-color: %2$s;
		}

		.content .widget-full .featuredpage .more-link:focus,
		.content .widget-full .featuredpage .more-link:hover {
			background-color: %2$s;
			color: %4$s;
		}

		.content .widget-full .featuredpage .entry-title a:focus,
		.content .widget-full .featuredpage .entry-title a:hover {
			color: %5$s;
		}

		', $dark_color, author_color_contrast( $dark_color ), author_change_brightness( $dark_color ), author_color_contrast( author_color_contrast( $dark_color ) ), author_change_brightness( author_color_contrast( author_color_contrast( $dark_color ) ) ) ) : '';

	$css .= ( author_customizer_get_default_accent_color() !== $accent_color ) ? sprintf( '

		a,
		.archive-pagination li a:hover,
		.archive-pagination .active a,
		.entry-title a:hover,
		.footer-widgets a:hover,
		.site-footer a:hover {
			color: %1$s;
		}

		div .book-featured-text-banner,
		.nav-secondary .genesis-nav-menu .highlight > a {
			background-color: %1$s;
			color: %2$s;
		}

		', $accent_color, author_color_contrast( $accent_color ), author_change_brightness( $accent_color ) ) : '';

	if( $css ){
		wp_add_inline_style( $handle, $css );
	}

}
