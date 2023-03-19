<?php 
 add_action('after_setup_theme','basic_function_woomart');
 function basic_function_woomart(){
    // text domain
    load_theme_textdomain('woomart',get_template_directory().'/lang');
    add_theme_support('woocommerce');
 }

remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content','amder_function',10);
function amder_function(){
  echo "<div class='Humayun'><div class='kabir'>";
}

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
add_action ('woocommerce_before_main_content','breadcrumb_function', 20);

function breadcrumb_function( $args = array() ) {
   $args = wp_parse_args(
      $args,
      apply_filters(
         'woocommerce_breadcrumb_defaults',
         array(
            'delimiter'   => '&nbsp;&#47;&nbsp;',
            'wrap_before' => '<nav class="woocommerce-breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
         )
      )
   );

   $breadcrumbs = new WC_Breadcrumb();

   if ( ! empty( $args['home'] ) ) {
      $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
   }

   $args['breadcrumb'] = $breadcrumbs->generate();

   /**
    * WooCommerce Breadcrumb hook
    *
    * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
    */
   do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

   wc_get_template( 'global/breadcrumb.php', $args );
}







//  add_filter('kabir','kabirfilter',12);
//  function kabirfilter($newthing){
//      return $newthing."<br>". " I am Learing wordpress theme devlopment part"."<br>";
//  }

//  add_filter('kabir','filtertwo',15);
//  function filtertwo($newthing){
//     return $newthing." I am also leaning PHP";
//  }
// ?>