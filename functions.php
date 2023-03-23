<?php 
 add_action('after_setup_theme','basic_function_woomart');
 function basic_function_woomart(){
    // text domain
    load_theme_textdomain('woomart',get_template_directory().'/lang');
    add_theme_support('woocommerce');
 }
 //includ mincart 
 function custom_theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Mini Cart', 'woomart' ),
        'id' => 'mini-cart',
        'description' => __( 'Add mini cart widget here.', 'woomart' ),
        'before_widget' => '<div class="mini-cart-widget">',
        'after_widget' => '</div>',
    ) );
 }
 add_action( 'widgets_init', 'custom_theme_widgets_init' );
 
 // Include Css 
 function my_custom_styles() {
    wp_enqueue_style( 'my-styles', get_stylesheet_uri(), array(), '1.0.0', 'all' );
 }
 add_action( 'wp_enqueue_scripts', 'my_custom_styles' );
 
 // Include jQuery 
 function my_custom_function() {
    wp_enqueue_script( 'my-script', 'https://cdn.example.com/my-script.js', array(), '1.0.0', true );
 }
 add_action( 'wp_enqueue_scripts', 'my_custom_function' );
 

//add field in billing address form
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content','amder_function',10);
function amder_function(){
  echo "<div class='Humayun'><div class='kabir'>";
}

add_filter('woocommerce_show_page_title','function_of_page');
function function_of_page(){
   return false;
}

add_filter( 'woocommerce_checkout_fields' , 'remove_billing_post_field' );

function remove_billing_post_field( $fields ) {
    unset( $fields['billing']['billing_postcode'] );
    return $fields;
}


// Add custom field to billing details
add_filter( 'woocommerce_checkout_fields', 'add_custom_billing_field' );

function add_custom_billing_field( $fields ) {

    $fields['billing']['custom_field_productname'] = array(
        'type'          => 'text',
        'class'         => array('my-custom-class form-row-first'),
        'label'         => __('Product Name:'),
        'placeholder'   => __('Product Name'),
        'required'      => true,
        'clear'         => true,

    );

    return $fields;
}
add_action( 'woocommerce_checkout_update_order_meta', 'save_custom_field_to_order_meta' );

function save_custom_field_to_order_meta( $order_id ) {
    if ( ! empty( $_POST['custom_field_productname'] ) ) {
        $custom_field_value = sanitize_text_field( $_POST['custom_field_productname'] );
        update_post_meta( $order_id, '_custom_field_productname', $custom_field_value );
    }
}

// Data show to admin 
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_page' );

function display_custom_field_on_order_page( $order ) {
    echo '<p><strong>'.__('Product Name').':</strong> ' . get_post_meta( $order->get_id(), '_custom_field_productname', true ) . '</p>';
}


// Adds the new tab
add_filter( 'woocommerce_product_tabs', 'add_product_tab' );
function add_product_tab( $tabs ) {
    
    
    $tabs['additional_information'] = array(
        'title'    => __( 'Additional Information', 'woocommerce' ),
        'priority' => 20,
        'callback' => 'additional_information_tab_content'
    );
    
    return $tabs;
}

// Displays the tab content
function additional_information_tab_content() {
    echo '<h2>' . __( 'Additional Information', 'woocommerce' ) . '</h2>';
    echo '<p>' . __( 'This is the content for the Additional Information tab.', 'woocommerce' ) . '</p>';
}



// Adds another  new tab
add_filter( 'woocommerce_product_tabs', 'add_product_tab1' );
function add_product_tab1( $tabss ) {
    
    
    $tabss['additional_information1'] = array(
        'title'    => __( 'Humayun', 'woocommerce' ),
        'priority' => 22,
        'callback' => 'additional_information_tab_content1'
    );
    
    return $tabss;
}

// Displays the tab content
function additional_information_tab_content1() {
    echo '<h2>' . __( 'Humayun', 'woocommerce' ) . '</h2>';
    echo '<p>' . __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'woocommerce' ) . '</p>';
}

// ?>