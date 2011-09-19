<?php

/************************************************************
 * Helper function when setting up the site to see what 
 * template is actually being loaded
 */

function getTemplateName () {
    foreach ( debug_backtrace() as $called_file ) {
	foreach ( $called_file as $index ) {
            if ( !is_array($index[0]) AND strstr($index[0],'/themes/') AND !strstr($index[0],'footer.php') ) {
                $template_file = $index[0] ;
            }
	}
    }
    $template_contents = file_get_contents($template_file) ;
    preg_match_all("(Template Name:(.*)\n)siU",$template_contents,$template_name);
    $template_name = trim($template_name[1][0]);
    if ( !$template_name ) { $template_name = '(default)' ; }
    $template_file = array_pop(explode('/themes/', basename($template_file)));
  return $template_file . ' > '. $template_name ;
}

if (function_exists("add_theme_support")) {
    add_theme_support('post-thumbnails');
    add_image_size('home-page-large', 300, 300, true);
    add_image_size('home-page-small', 100, 100, true);
}
