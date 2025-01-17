<?php
/**
 * discipl.org WP theme (2019).
 *
 * This file adds the default theme settings to the ICTU Theme discipl.org (2019) theme.
 *
 * @package discipl-2019
 * @author  StudioPress / Paul van Buuren
 * @license GPL-2.0+
 * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */

add_filter( 'genesis_theme_settings_defaults', 'author_theme_defaults' );
/**
 * Updates theme settings on reset.
 *
 * @since 1.0.0
 */
function author_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['image_alignment']           = 'alignleft';
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'full-width-content';

	return $defaults;

}

add_action( 'after_switch_theme', 'author_theme_setting_defaults' );
/**
 * Updates theme settings on activation.
 *
 * @since 1.0.0
 */
function author_theme_setting_defaults() {

	if( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'image_alignment'           => 'alignleft',
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'full-width-content',
		) );

		if ( function_exists( 'GenesisResponsiveSliderInit' ) ) {

			genesis_update_settings( array(
				'location_horizontal'             => 'left',
				'location_vertical'               => 'top',
				'posts_num'                       => '5',
				'slideshow_arrows'                => 0,
				'slideshow_excerpt_content_limit' => '100',
				'slideshow_excerpt_content'       => 'full',
				'slideshow_excerpt_width'         => '60',
				'slideshow_excerpt_show'          => 1,
				'slideshow_height'                => '400',
				'slideshow_more_text'             => __( 'Continue Reading&hellip;', 'discipl' ),
				'slideshow_pager'                 => 1,
				'slideshow_title_show'            => 1,
				'slideshow_width'                 => '1080',
			), GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD );

		}

	}

	update_option( 'posts_per_page', 6 );

}

add_filter( 'genesis_responsive_slider_settings_defaults', 'author_responsive_slider_defaults' );
/**
 * Updates Genesis Responsive Slider settings on activation.
 *
 * @since 1.0.0
 */
function author_responsive_slider_defaults( $defaults ) {

	$args = array(
		'location_horizontal'             => 'left',
		'location_vertical'               => 'top',
		'posts_num'                       => '5',
		'slideshow_arrows'                => 0,
		'slideshow_excerpt_content_limit' => '100',
		'slideshow_excerpt_content'       => 'full',
		'slideshow_excerpt_width'         => '60',
		'slideshow_excerpt_show'          => 1,
		'slideshow_height'                => '400',
		'slideshow_more_text'             => __( 'Continue Reading&hellip;', 'discipl' ),
		'slideshow_pager'                 => 1,
		'slideshow_title_show'            => 1,
		'slideshow_width'                 => '1080',
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}

add_filter( 'simple_social_default_styles', 'author_social_default_styles' );
/**
* Updates Simple Social Icon settings on activation.
*
* @since 1.0.0
*/
function author_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'aligncenter',
		'background_color'       => '#000000',
		'background_color_hover' => '#0085da',
		'border_radius'          => 3,
		'icon_color'             => '#ffffff',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}
