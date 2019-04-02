<?php

/**
// * discipl.org WP theme (2019) - archive.php
// * ----------------------------------------------------------------------------------
// * sep. file with genesis code for archive pages
// * ----------------------------------------------------------------------------------
// * @author  StudioPress / Paul van Buuren
// * @license GPL-2.0+
// * @package discipl-2019
// * @version 1.0.2
// * @desc.   Bugfixes css en functions.php.
// * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */



add_action( 'genesis_loop', 'discipl_frontend_loop_archive_title', 8 );

add_action( 'genesis_loop', 'discipl_frontend_add_cta_button', 9 );


add_action( 'genesis_before_while', 'discipl_frontend_add_flexwrapper_open', 9 );
add_action( 'genesis_after_endwhile', 'discipl_frontend_add_flexwrapper_close', 11 );




//* Remove the post image (requires HTML5 theme support)
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

//* Remove the post image (requires HTML5 theme support)
add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );


// Run the Genesis loop.
genesis();