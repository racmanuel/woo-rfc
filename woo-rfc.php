<?php
/**
 * Plugin Name: Woo-RFC
 * Plugin URI:  plugin-url
 * Description: Plugin para añadir campos adicionales a cumplir para realizar facturas en Mexico.
 * Version:     2.0.0
 * Author:      Manuel Ramirez Coronel
 * Author URI:  https://github.com/racmanuel
 * Text Domain: woo-rfc
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     Woo-RFC
 * @author      Manuel Ramirez Coronel
 * @copyright   2022
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      woo_rfc
 */

defined('ABSPATH') || die('No script kiddies please!');

define('WOO_RFC_VERSION', '1.0.0');
define('WOO_RFC_PLUGIN', __FILE__);
define('WOO_RFC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WOO_RFC_PLUGIN_PATH', plugin_dir_path(__FILE__));

require WOO_RFC_PLUGIN_PATH . 'includes/custom_fields.php';
/**
 * Load localization files
 *
 * @return void
 */
function woo_rfc_plugin_init()
{
    load_plugin_textdomain('woo-rfc', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'woo_rfc_plugin_init');


/**
 * Loads Scripts
 *
 * @return void
 */
function woo_rfc_enqueue_scripts()
{
    wp_register_script(
        'woo-rfc',
        WOO_RFC_PLUGIN_URL . '/assets/js/woo-rfc-dist.js',
        array('jquery'),
        WOO_RFC_VERSION,
        true
    );
    wp_enqueue_script('woo-rfc');
}
add_action('wp_enqueue_scripts', 'woo_rfc_enqueue_scripts');



