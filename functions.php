<?php

/**
// * discipl.org WP theme (2019) - functions.php
// * ----------------------------------------------------------------------------------
// * Zonder functions geen functionaliteit, he?
// * ----------------------------------------------------------------------------------
// * @author  StudioPress / Paul van Buuren
// * @license GPL-2.0+
// * @package discipl-2019
// * @version 0.1.1
// * @desc.   Webfonts toegevoegd; portfolio en teammembers als CPT toegevoegd; homepage totaal onder handen genomen.
// * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */


//========================================================================================================

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//========================================================================================================

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'discipl_localization_setup' );

function discipl_localization_setup(){
	load_child_theme_textdomain( 'author-pro', get_stylesheet_directory() . '/languages' );
}

//========================================================================================================

// Add the theme helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

//========================================================================================================

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', __( 'ICTU Theme discipl.org (2019)', 'discipl' ) );
define( 'CHILD_THEME_URL', 'https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019' );
define( 'CHILD_THEME_VERSION', '0.1.1' );
define( 'CHILD_THEME_VERSION_DESCRIPTION',  "Footerwidgets beter uitgelijnd + blokken op homepage op 4-koloms breedte." );

$sharedfolder = get_stylesheet_directory();
$sharedfolder = preg_replace('|genesis|i','discipl-2019',$sharedfolder);
define( 'RHSWP_FOLDER',                      $sharedfolder );

$siteURL      =  get_stylesheet_directory_uri();
$siteURL      =  preg_replace('|https://|i', '//', $siteURL );
$siteURL      =  preg_replace('|http://|i', '//', $siteURL );
define( 'RHSWP_THEMEFOLDER',                 $siteURL );

if ( ! defined( 'DISCIPL_CPT_PORTFOLIO' ) ) {
  define( 'DISCIPL_CPT_PORTFOLIO',               'portfolio' );  // slug for custom taxonomy 'dossier'
}

if ( ! defined( 'DISCIPL_CPT_TEAM' ) ) {
  define( 'DISCIPL_CPT_TEAM',               'team' );  // slug for custom taxonomy 'dossier'
}

// Include for Advanced Custom Fields and Custom Post Type definitions
include_once( RHSWP_FOLDER . '/includes/acf-posttypes-and-taxonomy-definitions.php' );

//========================================================================================================

// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'discipl_enqueue_scripts_styles' );

function discipl_enqueue_scripts_styles() {

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'typekit-fonts', '//use.typekit.net/pwt2qnk.css', array(), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'author-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'author-responsive-menu',
		'genesis_responsive_menu',
		discipl_responsive_menu_settings()
	);

	wp_enqueue_script( 'author-match-height', get_stylesheet_directory_uri(). '/js/jquery.matchHeight.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'author-global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery', 'author-responsive-menu', 'author-match-height' ), CHILD_THEME_VERSION, true );

}

// Define the responsive menu settings.
function discipl_responsive_menu_settings() {

	$settings = array(
		'mainMenu'    => __( 'Menu', 'discipl' ),
		'subMenu'     => __( 'Submenu', 'discipl' ),
		'menuClasses' => array(
			'combine' => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	);

	return $settings;

}

//========================================================================================================

// Add new image sizes.
add_image_size( 'featured-content', 800, 800, TRUE );
add_image_size( 'fotoblok', 660, 460, TRUE );
add_image_size( 'pasfoto', 500, 500, TRUE );

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable Genesis Accessibility Components.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'search-form', 'skip-links' ) );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

//========================================================================================================

// Unregister layout settings.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Unregister secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Unregister the header right widget area.
unregister_sidebar( 'header-right' );

//========================================================================================================

// Rename menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Main Menu', 'discipl' ) ) );

// Remove output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

//========================================================================================================

// Remove navigation meta box.
add_action( 'genesis_theme_settings_metaboxes', 'discipl_remove_genesis_metaboxes' );

function discipl_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_theme_settings_pagehook, 'main' );
}

//========================================================================================================

// Remove skip link for primary navigation and add skip link for footer widgets.
add_filter( 'genesis_skip_links_output', 'discipl_skip_links_output' );

function discipl_skip_links_output( $links ){

	if( isset( $links['genesis-nav-primary'] ) ){
		unset( $links['genesis-nav-primary'] );
	}

	$new_links = $links;
	array_splice( $new_links, 1 );

	if ( has_nav_menu( 'secondary' ) ) {
		$new_links['genesis-nav-secondary'] = __( 'Skip to secondary navigation', 'discipl' );
	}

	return array_merge( $new_links, $links );

}

//========================================================================================================

// Add ID to secondary navigation.
add_filter( 'genesis_attr_nav-secondary', 'discipl_add_nav_secondary_id' );

function discipl_add_nav_secondary_id( $attributes ) {

	$attributes['id'] = 'genesis-nav-secondary';

	return $attributes;

}

//========================================================================================================

// Reposition the navigation.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

add_action( 'genesis_header', 'genesis_do_nav', 12 );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

//========================================================================================================

// Setup widget counts.
function discipl_count_widgets( $id ) {

	$sidebars_widgets = wp_get_sidebars_widgets();

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}

}

// Function to get the class for a flexible widget.
function author_widget_area_class( $id ) {

	$count = discipl_count_widgets( $id );

	$class = '';

	if( $count == 1 ) {
		$class .= ' widget-full';
	} elseif( $count % 3 == 0 ) {
		$class .= ' widget-thirds';
	} elseif( $count % 4 == 0 ) {
		$class .= ' widget-fourths';
	} elseif( $count % 2 == 1 ) {
		$class .= ' widget-halves uneven';
	} else {
		$class .= ' widget-halves';
	}

	return $class;

}

//========================================================================================================
if ( 22 == 33 ) {
  
  // Register widget areas.
  genesis_register_sidebar( array(
  	'id'          => 'front-page-1',
  	'name'        => __( 'Front Page 1', 'discipl' ),
  	'description' => __( 'This is the front page 1 section.', 'discipl' ),
  ) );
  genesis_register_sidebar( array(
  	'id'          => 'front-page-2',
  	'name'        => __( 'Front Page 2', 'discipl' ),
  	'description' => __( 'This is the front page 2 section.', 'discipl' ),
  ) );
  genesis_register_sidebar( array(
  	'id'          => 'front-page-3',
  	'name'        => __( 'Front Page 3', 'discipl' ),
  	'description' => __( 'This is the front page 3 section.', 'discipl' ),
  ) );
  genesis_register_sidebar( array(
  	'id'          => 'front-page-4',
  	'name'        => __( 'Front Page 4', 'discipl' ),
  	'description' => __( 'This is the front page 4 section.', 'discipl' ),
  ) );
  genesis_register_sidebar( array(
  	'id'          => 'front-page-5',
  	'name'        => __( 'Front Page 5', 'discipl' ),
  	'description' => __( 'This is the front page 5 section.', 'discipl' ),
  ) );
  
}

//========================================================================================================

function discipl_get_url_and_label( $string = '',  $wraptag = '',  $wraptagclass = '' ) {
  $returnstring = '';
  
  if ( $string ) {
    $labelarr = explode( '//', $string );
    
    $start = '<a href="' . $string . '">';
    $end = '</a>';
    
    if ( $labelarr[1] ) {
      $label = $labelarr[1];
    }
    else {
      $label = $string;
    }
    if ( $wraptagclass ) {
     $label = $wraptagclass . ': ' . $label; 
      $start = '<a href="' . $string . '" class="' . $wraptagclass . '">';
    }

    $returnstring = $start . $label . $end;

    if ( $label && $wraptag ) {
      $returnstring = '<' . $wraptag . '>' . $returnstring . '</' . $wraptag . '>';
    }
  }
  return $returnstring;
}

//========================================================================================================

add_action( 'genesis_entry_content', 'discipl_frontend_add_page_content', 12 );

// HTML output voor de verschillende blokken

function discipl_frontend_add_page_content() {
  global $post;

  $sectioncounter = 0;

  if ( 'page'    == get_post_type() ) {
    
    $theid          = get_the_ID();
    $contentblokken = get_field( 'discipl_contentblocks', $theid );

    if( have_rows('discipl_contentblocks', $theid ) ):

      while( have_rows('discipl_contentblocks', $theid ) ): the_row(); 

        $sectioncounter++; // om sowieso een unieke ID te kunnen maken

        // vier soorten blokken mogelijk:
        // - tekst_foto : Tekst met foto
        // - driekoloms : Driekoloms tekst
        // - teamblock : Block met team-info
        // - porfolioblock : Portfolio-items

				$type_block             = get_sub_field('soort_blok');
				$section_title          = get_sub_field('fotoblock_title');
        $title_id               = sanitize_title( $section_title . '-' . $sectioncounter );


        if ( 'tekst_foto' == $type_block ) {

          $size                   = 'fotoblok';
          
  				$fotoblock_text         = get_sub_field('fotoblock_text');
  				$fotoblock_quote        = get_sub_field('fotoblock_quote');
  				$image                  = get_sub_field('fotoblock_image');
  				$fotoblock_bgcolor      = get_sub_field('fotoblock_bgcolor');
  				$fotoblock_alignment    = get_sub_field('fotoblock_alignment');
  				$fotoblock_logovariant  = get_sub_field('fotoblock_logovariant');

          if ( ! $fotoblock_quote ) {
            $fotoblock_quote = '&nbsp;';
          }

          echo '<section aria-labelledby="' . $title_id . '" class="' . $type_block . ' ' . $fotoblock_alignment . ' ' . $fotoblock_bgcolor . '">';
          echo '<div class="wrap">';

          if ( 'align-left' == $fotoblock_alignment ) {
            // foto aan de linkerkant, tekst rechts

            echo '<div class="quote-photo">';
            if ( $image ) {
              echo wp_get_attachment_image( $image['ID'], $size );
            }
            echo '<p class="quote ' . $fotoblock_logovariant . '">' . sanitize_textarea_field( $fotoblock_quote ) . '</p>';
            echo '</div>'; // .quote-photo
            
            echo '<div class="title-text">';
            echo '<h2 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h2>';
            echo sanitize_textarea_field( $fotoblock_text );
            echo '</div>'; // .title-text
            
          }
          else {
            // foto aan de rechterkant, tekst links
            echo '<div class="title-text">';
            echo '<h2 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h2>';
            echo sanitize_textarea_field( $fotoblock_text );
            echo '</div>'; // .title-text

            echo '<div class="quote-photo">';
            if ( $image ) {
              echo wp_get_attachment_image( $image['ID'], $size );
            }
            echo '<p class="quote ' . $fotoblock_logovariant . '">' . sanitize_textarea_field( $fotoblock_quote ) . '</p>';
            echo '</div>'; // .quote-photo
            
          }

          echo '</div>';  // .wrap
          echo '</section>';
      
        }
        elseif ( 'driekoloms' == $type_block ) {

  				$section_align        = get_sub_field('kolommen_uitlijning');

          // min 2, max 3 kolommen
          if( have_rows('kolommen') ) {

            echo '<div aria-labelledby="' . $title_id . '" class="' . $type_block . ' ' . $section_align . '">';
            echo '<div class="wrap">';
            echo '<h2 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h2>';
            
            echo '<div class="flex">';
            
            while( have_rows('kolommen') ): the_row();

              $sectioncounter++; // om sowieso een unieke ID te kunnen maken
      				$section_logo         = '';

      				$section_title        = get_sub_field('discipl_column_title');
      				$section_text         = get_sub_field('discipl_column_text');
      				$logovariant          = get_sub_field('discipl_column_logovariant');

      				if ( 'logo_lightblue' == $logovariant ) {
        				$section_logo = 'discipl-logo-lightblue.png';
      				}
      				elseif ( 'logo_violet' == $logovariant ) {
        				$section_logo = 'discipl-logo-violet.png';
      				}
      				elseif ( 'logo_darkblue' == $logovariant ) {
        				$section_logo = 'discipl-logo-darkblue.png';
      				}

              $title_id             = sanitize_title( $section_title . '-' . $sectioncounter );

              echo '<section aria-labelledby="' . $title_id . '">';
              if ( $section_logo ) {
                echo '<img src="' . RHSWP_THEMEFOLDER . '/images/' . $section_logo . '" alt="" height="120" width="120" >';
              }
              echo '<h3 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h3>';
              echo '<p> ' . $section_text . '</p>';
              echo '</section>';
              
            endwhile;
          
            echo '</div>';  // .flex
            echo '</div>';  // .wrap
            echo '</div>';  // .wrap

          }

        }
        elseif ( 'teamblock' == $type_block ) {

  				$section_text         = get_sub_field('teaminfo_text');
          $posts                = get_sub_field('teaminfo_teammembers');

          echo '<div aria-labelledby="' . $title_id . '" class="' . $type_block . ' ' . $fotoblock_alignment . ' ' . $fotoblock_bgcolor . '">';
          echo '<div class="wrap">';
          echo '<h2 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h2>';
          echo '<p> ' . $section_text . '</p>';

          if( $posts ) {

            echo '<div class="flex">';

            foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT);

              $sectioncounter++; // om sowieso een unieke ID te kunnen maken

      				$section_title        = get_the_title( $p->ID );
      				$section_text         = get_field( 'teammember_title', $p->ID);
      				$website              = get_field( 'teammember_website_url', $p->ID);
      				$github               = get_field( 'teammember_github_url', $p->ID);
      				$linkedin             = get_field( 'teammember_linkedin_url', $p->ID);
      				$twitter              = get_field( 'teammember_twitter_url', $p->ID);
              $title_id             = sanitize_title( $section_title . '-' . $sectioncounter );

              echo '<section aria-labelledby="' . $title_id . '">';

              echo get_the_post_thumbnail( $p->ID, 'pasfoto' );

              echo '<h3 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h3>';
              echo '<p> ' . $section_text . '</p>';
              if ( $website || $github || $linkedin || $twitter) {

                $label = sprintf( __( 'Links en social media van %s', 'wp-rijkshuisstijl' ), $section_title ); 
                echo '<ul aria-label="' . $label . '" class="social-media">';
                echo discipl_get_url_and_label( $website, 'li', 'website' );
                echo discipl_get_url_and_label( $github, 'li', 'github' );
                echo discipl_get_url_and_label( $linkedin, 'li', 'linkedin' );
                echo discipl_get_url_and_label( $twitter, 'li', 'twitter' );
                echo '</ul>';
              }
              echo '</section>';


            endforeach;

            echo '</div>';  // .flex
            
          }

          echo '</div>';  // .wrap
          echo '</div>';
          
        }
        elseif ( 'porfolioblock' == $type_block ) {

  				$section_text         = get_sub_field('teaminfo_text');
          $posts                = get_sub_field('portfolio_items');

          echo '<section aria-labelledby="' . $title_id . '" class="' . $type_block . ' ' . $fotoblock_alignment . ' ' . $fotoblock_bgcolor . '">';
          echo '<div class="wrap">';
          echo '<h2 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h2>';
          echo '<p> ' . $section_text . '</p>';

          if( $posts ) {

            echo '<div class="flex">';

            foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT);

              $sectioncounter++; // om sowieso een unieke ID te kunnen maken
      				$section_title        = get_the_title( $p->ID );
      				$section_description  = '';

      				if ( get_the_excerpt( $p->ID ) ) {
        				$section_description  = get_the_excerpt( $p->ID );
      				}
              $title_id             = sanitize_title( $section_title . '-' . $sectioncounter );

              echo '<section aria-labelledby="' . $title_id . '">';
              echo get_the_post_thumbnail( $p->ID, 'pasfoto' );
              echo '<h3 id="' . $title_id . '">' . sanitize_text_field( $section_title ) . '</h3>';
              echo '<p>' . $section_description . '</p>';
              echo '</section>';

            endforeach;

            echo '</div>';  // .flex
            
          }
          
          echo '</div>';  // .wrap
          echo '</section>';

        }
              
      endwhile;
      
    endif;
    
  }

}


//========================================================================================================

// kill switch om te checken of de ACF plugin wel actief is.

function discipl_acf_check( $fn ) {

  
  $theline = __( 'ACF plugin is niet actief (' . $fn . ') ', 'wp-rijkshuisstijl' );
  error_log( $theline );
  if ( ! is_admin() ) {
    if ( WP_DEBUG ) {
      die( $theline );
    }
    else {
      echo '<p>' . $theline . '</p>';
    }
  }
  
}

//========================================================================================================

// kill switch om te checken of de ACF plugin wel actief is.

if ( !function_exists( 'get_field' )  ||  !function_exists( 'have_rows' )  ) {

  discipl_acf_check( 'get_field' );

}

//========================================================================================================

// mijn standaard debugstring uitspuger

if (! function_exists( 'dodebug' ) ) {
  
  function dodebug( $string, $tag = 'p' ) {
    if ( WP_DEBUG && WP_LOCAL_DEV ) {
      echo '<' . $tag . ' class="debugstring"> ' . $string . '</' . $tag . '>';
    }
  }

}

//========================================================================================================

if (! function_exists( 'dovardump' ) ) {
  
  function dovardump($data, $context = '', $echo = true ) {
    
    if ( WP_DEBUG ) {
      $contextstring  = '';
      $startstring    = '<div class="debug-context-info">';
      $endtring       = '</div>';
      
      if ( $context ) {

        $contextstring = '<p>Vardump ' . $context . '</p>';        
      }
      
      if ( is_array( $data ) || is_object( $data ) ) {
        
        $theline = "array: " . print_r( $data, true );
      }
      else {

        $theline = $data;
      }
      
      error_log( $theline );
      
      if ( $echo ) {
      
        echo $startstring . '<hr>';
        echo $contextstring;        
        echo '<pre>';
        print_r($data);
        echo '</pre><hr>' . $endtring;
      }
      else {
        return '<hr>' . $contextstring . '<pre>' . print_r($data, true) . '</pre><hr>';
      }
    }        
  }        
}        
  
  
//========================================================================================================

