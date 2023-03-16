<?php 
 add_action('after_setup_theme','basic_function_woomart');
 function basic_function_woomart(){
    // text domain
    load_theme_textdomain('woomart',get_template_directory().'/lang');
    add_theme_support('woocommerce');
 }
 add_filter('kabir','kabirfilter');
 function kabirfilter($newthing){
     return $newthing. " I am from Tangail";
 }

?>