<?php

/**
// * discipl.org WP theme (2019) - front-page.php
// * ----------------------------------------------------------------------------------
// * This file adds the front page to the ICTU Theme discipl.org (2019) theme.
// * ----------------------------------------------------------------------------------
// * @author  StudioPress / Paul van Buuren
// * @license GPL-2.0+
// * @package discipl-2019
// * @version 1.0.2
// * @desc.   Bugfixes css en functions.php.
// * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */


add_action( 'genesis_entry_content', 'discipl_frontend_add_cta_button', 8 );

//========================================================================================================

// Define front-page body class.
function author_body_class( $classes ) {

	$classes[] = 'front-page';

	return $classes;

}

//========================================================================================================

// Run the Genesis loop.
genesis();
