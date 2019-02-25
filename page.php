<?php

/**
// * discipl.org WP theme (2019) - page.php
// * ----------------------------------------------------------------------------------
// * This file adds the front page to the ICTU Theme discipl.org (2019) theme.
// * ----------------------------------------------------------------------------------
// * @author  StudioPress / Paul van Buuren
// * @license GPL-2.0+
// * @package discipl-2019
// * @version 1.0.1
// * @desc.   Eerste accept-versie.
// * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019
 */


add_action( 'genesis_entry_content', 'discipl_frontend_add_cta_button' );



// Run the Genesis loop.
genesis();
