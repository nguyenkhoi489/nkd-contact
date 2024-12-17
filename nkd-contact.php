<?php

/**
 * Plugin Name: NKD Extra Feature
 * Plugin URI: /plugin/nkd-contact
 * Update URI: 
 * Description: Extra feature for flatsome themes
 * Version: 1.0
 * Requires at least: 5.5
 * Requires PHP: 7.4
 * Author: Thái Nguyên Khôi
 * Author URI: https://www.facebook.com/nguyenkhoi489/
 * License: GPL
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: nkd-contact
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

//details
define('Plugin_Path', plugin_dir_path(__FILE__));
define('Plugin_URI', plugin_dir_url(__FILE__));
define('Plugin_VERSION', '1.0');
define('Plugin_ITEM_NAME', 'Contact Button');

require_once Plugin_Path . 'inc/helper.php';
require_once Plugin_Path . 'inc/ajax.php';

// add link setting
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links');
function add_action_links($actions)
{
    $mylinks = array(
        '<a href="' . admin_url('admin.php?page=nkd-contact') . '">' . esc_html__('Settings', 'setting_contact') . '</a>',
    );
    $actions = array_merge($actions, $mylinks);
    return $actions;
}

// register Setting
if (!function_exists('nkd_register_setting')) {
    function nkd_register_setting()
    {
        //Register Button
        register_setting('nkd_button_options_group', 'config_hotline', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_hotline_tooltip', 'nkd_button_callback');

        register_setting('nkd_button_options_group', 'config_hotline_2', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_hotline_2_tooltip', 'nkd_button_callback');

        register_setting('nkd_button_options_group', 'config_hotline_3', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_hotline_3_tooltip', 'nkd_button_callback');

        register_setting('nkd_button_options_group', 'config_zalo', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_zalo_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_telegram', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_telegram_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_instagram', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_instagram_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_youtube', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_youtube_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_tiktok', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_tiktok_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_fanpage', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_fanpage_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_whatsapp', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_whatsapp_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_viber', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_viber_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_map_url', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_map_url_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_contact_url', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_contact_url_tooltip', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_shopee', 'nkd_button_callback');
        register_setting('nkd_button_options_group', 'config_shopee_tooltip', 'nkd_button_callback');

        //Register Form
        register_setting('nkd_form_options_group', 'config_form');
        register_setting('nkd_form_options_group', 'config_form_title');

        //Setting Form
        register_setting('nkd_settings_options_group', 'config_setting_enable');
        register_setting('nkd_settings_options_group', 'config_setting_enable_form');
        register_setting('nkd_settings_options_group', 'config_setting_enable_tooltip');
        register_setting('nkd_settings_options_group', 'config_setting_enable_show_default_tooltip');
        register_setting('nkd_settings_options_group', 'config_setting_postion');
        register_setting('nkd_settings_options_group', 'config_setting_center');
        register_setting('nkd_settings_options_group', 'config_setting_list');
        register_setting('nkd_settings_options_group', 'config_setting_post_product_count_view_enable');

        register_setting('nkd_settings_options_group', 'config_setting_classic_editor_enable');
        register_setting('nkd_settings_options_group', 'config_setting_smtp_enable');
        register_setting('nkd_settings_options_group', 'config_setting_transition_enable');
        register_setting('nkd_settings_options_group', 'config_setting_group_icon_mobile_enable');
        register_setting('nkd_settings_options_group', 'config_setting_free_to_contact_enable');


        // SMTP
        register_setting('add_mailer_group', 'config_mailer', 'mailer_callback');
        register_setting('add_mailer_group', 'confg_emalNhan', 'mailer_callback');
        register_setting('add_mailer_group', 'config_host', 'mailer_callback');
        register_setting('add_mailer_group', 'config_port', 'mailer_callback');
        register_setting('add_mailer_group', 'config_SMTPAuth', 'mailer_callback');
        register_setting('add_mailer_group', 'config_userName', 'mailer_callback');
        register_setting('add_mailer_group', 'config_passWord', 'mailer_callback');
        register_setting('add_mailer_group', 'config_SMTPSecure', 'mailer_callback');
        register_setting('add_mailer_group', 'config_from', 'mailer_callback');
        register_setting('add_mailer_group', 'config_fromName', 'mailer_callback');
    }
}
add_action('admin_init', 'nkd_register_setting');


// add menu admin wp
function nkd_create_menu()
{
    add_menu_page(
        'Extra Feature',
        'Extra Feature',
        'administrator',
        'nkd-contact',
        'nkd_contact_page',
        plugins_url('/image/icon.png', __FILE__),
        5
    );
    add_submenu_page(
        'nkd-contact',
        'Contact Form',
        'Form Contact',
        'administrator',
        'nkd-contact-form',
        'nkd_form_page'
    );
    if (get_option('config_setting_smtp_enable') == 'on') {
        add_submenu_page(
            'nkd-contact',
            'SMTP Config',
            'SMTP Config',
            'administrator',
            'nkd-contact-smtp',
            'nkd_smtp_page'
        );
    }
    add_submenu_page(
        'nkd-contact',
        'Setting Contact',
        'Setting Contact',
        'administrator',
        'nkd-contact-setting',
        'nkd_setting_page'
    );
}
add_action('admin_menu', 'nkd_create_menu');

//callback for create_menu
function nkd_contact_page()
{
    require_once Plugin_Path . "inc/contact.php";
}
function nkd_form_page()
{
    require_once Plugin_Path . "inc/form.php";
}
function nkd_setting_page()
{
    require_once Plugin_Path . "inc/setting.php";
}
function nkd_smtp_page()
{
    require_once Plugin_Path . "inc/smtp.php";
}
function loaded_action()
{
    add_action('wp_footer', 'register_style_show');
    add_action('admin_enqueue_scripts', 'encript_administrator');

    if (get_option('config_setting_post_product_count_view_enable') == 'on') {
        function set_post_views_on_page_load() {
            if (is_single() && !is_product() ) { 
                setPostViews(get_the_ID()); 
            }
            if (class_exists('WooCommerce') && is_product())
            {
                setPostViews(get_the_ID()); 
            }
        }
        add_action('wp', 'set_post_views_on_page_load');
        
        require_once Plugin_Path . 'inc/count.php';
        add_filter('manage_posts_columns', 'posts_column_views');
        add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

        add_filter('manage_products_columns', 'posts_column_views');
        add_action('manage_products_custom_column', 'posts_custom_column_views', 5, 2);
        function posts_column_views($defaults)
        {
            $defaults['views_lastest'] = __('Views', '');
            return $defaults;
        }
        function posts_custom_column_views($column_name, $id)
        {
            if ($column_name === 'views_lastest') {
                echo getPostViews(get_the_ID(), false);
            }
        }
    }
    if (get_option('config_setting_classic_editor_enable') == 'on') {
        add_filter('use_block_editor_for_post', '__return_false');
    }
    if (get_option('config_setting_smtp_enable') == 'on') {
        add_action('phpmailer_init', function ($phpmailer) {

            if (!is_object($phpmailer)) {
                $phpmailer = (object) $phpmailer;
                $phpmailer->Mailer     = get_option('config_mailer');
                $phpmailer->Host       = get_option('config_host');
                $phpmailer->Port       = get_option('config_port');
                $phpmailer->SMTPAuth   = get_option('config_SMTPAuth');
                $phpmailer->Username   = get_option('config_userName'); //username 
                $phpmailer->Password   = get_option('config_passWord'); //pass
                $phpmailer->SMTPSecure = get_option('config_SMTPSecure');
                $phpmailer->From       = get_option('config_from');
                $phpmailer->FromName   = get_option('config_fromName');
            }
        });
    }
    if (!function_exists('pre')) {
        function pre($data)
        {
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
            die;
        }
    }
    if (get_option('config_setting_free_to_contact_enable') == 'on' && class_exists('WooCommerce')) {
        function devvn_wc_custom_get_price_html($price, $product)
        {

            if (! $product->get_price()) {
                if ($product->is_on_sale() && $product->get_regular_price()) {
                    $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));

                    $price = wc_format_price_range($regular_price, __('Free!', 'woocommerce'));
                } else {
                    $price = '<span class="amount">' . __('Liên hệ', 'woocommerce') . '</span>';
                }
            }
            return $price;
        }
        add_filter('woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2);

        // Hết hàng thành liên hệ
        function devvn_oft_custom_get_price_html($price, $product)
        {
            if (!is_admin() && !$product->is_in_stock()) {
                $price = '<span class="amount">' . __('Liên hệ', 'woocommerce') . '</span>';
            }
            return $price;
        }
        add_filter('woocommerce_get_price_html', 'devvn_oft_custom_get_price_html', 99, 2);
    }
}
add_action('plugins_loaded', 'loaded_action');

function register_style_show()
{
    if (get_option('config_setting_enable') === 'on') {
        wp_enqueue_style('nkd-frontend', Plugin_URI . 'assets/css/frontend.css', array(), null);
        wp_enqueue_script('nkd-frontend',  Plugin_URI . 'assets/js/frontend.js', array(), null, true);
        require_once Plugin_Path . 'short/render.php';
    }
    if (get_option('config_setting_enable') === 'on' && get_option('config_setting_enable_form') === 'on') {
        require_once Plugin_Path . 'short/form.php';
    }
    if (get_option('config_setting_group_icon_mobile_enable') == 'on') {
        wp_enqueue_style('nkd-mobile-icon', Plugin_URI . 'assets/css/icon_moblie.css', array(), null);
    }

    if (get_option('config_setting_transition_enable') == 'on') {
        wp_enqueue_style('nkd-hide-transion-mobile-icon', Plugin_URI . 'assets/css/hide_transion.css', array(), null);
    }
}

function encript_administrator()
{
    if (isset($_GET['page']) && $_GET['page'] == 'nkd-contact-setting') {
        wp_enqueue_media();
        wp_enqueue_style('nkd-contact-select2', Plugin_URI . 'assets/css/select2.min.css', array(), null);
        wp_enqueue_script('nkd-contact-select2',  Plugin_URI . 'assets/js/select2.full.min.js', array(), null, false);
    }
    if (isset($_GET['page']) && ($_GET['page'] == 'nkd-contact-setting' || $_GET['page'] == 'nkd-contact' || $_GET['page'] == 'nkd-contact-smtp' || $_GET['page'] == 'nkd-contact-form')) {
        wp_enqueue_script('nkd-contact-main',  Plugin_URI . 'assets/js/main.js', array(), null, false);
        wp_enqueue_style('nkd-contact', Plugin_URI . 'assets/css/main.css', array(), null);
        wp_localize_script('ajax_custom_script', 'ajaxurl', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
}
