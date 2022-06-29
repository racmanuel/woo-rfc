<?php
/**
 * Short Description
 *
 * @package    packace-name
 * @author     example <email>
 * @copyright  year Company
 * @version    Version
 */

defined( 'ABSPATH' ) || exit;

/**
 * Create the section beneath the products tab
 **/
add_filter('woocommerce_get_sections_checkout', 'wcslider_add_section');
function wcslider_add_section($sections)
{

    $sections['wcslider'] = __('WC Slider', 'text-domain');
    return $sections;

}
/**
 * Add settings to the specific section we created before
 */
add_filter('woocommerce_get_settings_checkout', 'wcslider_all_settings', 10, 2);
function wcslider_all_settings($settings, $current_section)
{
    /**
     * Check the current section is what we want
     **/
    if ($current_section == 'wcslider') {
        $settings_slider = array();
        // Add Title to the Settings
        $settings_slider[] = array('name' => __('WC Slider Settings', 'text-domain'), 'type' => 'title', 'desc' => __('The following options are used to configure WC Slider', 'text-domain'), 'id' => 'wcslider');
        // Add first checkbox option
        $settings_slider[] = array(
            'name' => __('Auto-insert into single product page', 'text-domain'),
            'desc_tip' => __('This will automatically insert your slider into the single product page', 'text-domain'),
            'id' => 'wcslider_auto_insert',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Enable Auto-Insert', 'text-domain'),
        );
        // Add second text field option
        $settings_slider[] = array(
            'name' => __('Slider Title', 'text-domain'),
            'desc_tip' => __('This will add a title to your slider', 'text-domain'),
            'id' => 'wcslider_title',
            'type' => 'text',
            'desc' => __('Any title you want can be added to your slider with this option!', 'text-domain'),
        );

        $settings_slider[] = array('type' => 'sectionend', 'id' => 'wcslider');
        return $settings_slider;

        /**
         * If not, return the standard settings
         **/
    } else {
        return $settings;
    }
}
