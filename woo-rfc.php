<?php
/**
 * Plugin Name:       Woo RFC
 * Description:       Show a checkbox in the Checkout of WooCommerce, if you need a Invoice show the field in the Front-End and in Backend (Admin Dashboard - WoooCommerce).
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.3
 * Author:            Manuel Rámirez Coronel
 * Author URI:        https://github.com/racmanuel
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woo-rfc
 * Domain Path:       /languages
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * -----------------------------------------------------
 * 1. En checkout mostramos el RFC
 * ----------------------------------------------------- * 
 */ 
function wc_add_rfc_field_to_checkout( $checkout ) {
    $current_user = wp_get_current_user();
    $saved_rfc = get_user_meta ($current_user, 'user_rfc', true);
  
    woocommerce_form_field( 'user_rfc_check', array(        
        'type' => 'checkbox',        
        'class' => array('user_rfc_check', 'form-row input', 'form-row'),        
        'label' => __('¿Necesitas Factura?'),        
        'required' => false
        )); 
   
 
    woocommerce_form_field( 'user_rfc', array(        
        'type' => 'text',        
        'class' => array('user_rfc', 'form-row input', 'form-row', 'hidden'),        
        'label' => __('RFC'),        
        'placeholder' => __('RFC'),        
        'required' => false
        ), 
        $saved_rfc ); 
}
add_action( 'woocommerce_after_checkout_billing_form', 'wc_add_rfc_field_to_checkout' ); 

/**
 * -----------------------------------------------------
 * 2. guardamos la información de RFC a nivel Orden - Pedido
 * Se podría guardar a nivel user, pero Woocommerce puede 
 * no pedir o crear un user para comprar
 * ----------------------------------------------------- * 
 *
 */
function wc_update_rfc($order_id, $post_values) { 
    if ( $order_id && $_POST['user_rfc'] ) {
        $rfc = sanitize_text_field( $_POST['user_rfc'] );
        update_post_meta ($order_id, 'user_rfc', $rfc);
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'wc_update_rfc', 10, 2);

/**
 * 3 Mostramos el RFC en el área Admin de Pedidos
 */
function wc_despliega_rfc( $order ) {    
    $valor = get_post_meta( $order->get_order_number(), 'user_rfc', true );
    if ($valor){
        echo '<p><strong>'.__('RFC ').':</strong> ' . get_post_meta( $order->get_order_number(), 'user_rfc', true ) . '</p>';    
    } else {
        echo '<p><strong>'.__('Sin RFC para facturar.').'</strong> </p>';
    }
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'wc_despliega_rfc', 10, 1 );

/**
 * 4 Incluimos el RFC en el email que se envía al cliente
 */
function wc_add_row_email( $order, $sent_to_admin, $plain_text, $email){
    $value = get_post_meta($order->get_order_number(), 'user_rfc', true );
    if ($value){
        echo "RFC: $value ";
    }else{
        echo "Puede pedir su factura fiscal en el correo: durante los siguientes 5 días.<br>";
    }
}
add_filter('woocommerce_email_order_meta', 'wc_add_row_email', 10, 4);

/**
 *  5 Incluimos el archivo de Javascript para ocultar y mostrar el field de RFC
 */
function enqueue_scripts_rfc(){
    wp_enqueue_script( 'rfc-js', plugin_dir_url( __FILE__ ) .  '/rfc.js', array( 'jquery' ), time(), true );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_rfc');