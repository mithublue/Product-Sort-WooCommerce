<?php
/*
 * Plugin Name: WC Product Sort
 * Description: A plugin to let users have different sorting options along with default ones
 * Plugin URI:
 * Author URI: http://cybercraftit.com/
 * Author: Mithu A Quayium
 * Text Domain: pswc
 * Domain Path: /languages
 * Version: 1.0
 * License: GPL2
 */
/**
 * Copyright (c) YEAR Mithu A Quayium (email: cemithu06@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'PSWC_VERSION', '1.0' );
define( 'PSWC_ROOT', dirname(__FILE__) );
define( 'PSWC_ASSET_PATH', plugins_url('assets',__FILE__) );

if( !function_exists( 'pri' ) ) {
    function pri( $data ) {
        echo '<pre>';print_r($data);echo '</pre>';
    }
}

class PSWC_Init{/**
 * @var Singleton The reference the *Singleton* instance of this class
 */
    private static $instance;
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        $this->includes();
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_action_links' ) );
    }

    function plugin_action_links( $links ) {
        $links[] = '<a href="'. get_admin_url(null, 'admin.php?page=wc-settings&tab=products&section=pswc_product_sort') .'">Settings</a>';
        $links[] = '<a target="_blank" href="https://cybercraftit.com/contact/">Contact for Customization</a>';
        $links[] = '<a target="_blank" href="https://cybercraftit.com/shop/">Our Products</a>';
        return $links;
    }

    /**
     * inlcude the necessary files
     * both admin adn frontend
     */
    public function includes(){
        require_once PSWC_ROOT.'/admin/wc-settings.php';
        require_once PSWC_ROOT.'/products.php';
    }
    /**
     * Enqueue scripts and styles
     * in admin panel
     */
    public function enqueue_scripts_styles( $hook ){
    }
    /**
     * Enqueue scripts and styles
     * in frontend
     */
    function wp_enqueue_scripts_styles(){

    }
}

PSWC_Init::get_instance();

function pswc_get_sort_term() {
    global $pswc_sort_term;

    if( !is_array( $pswc_sort_term ) ) {
        $pswc_sort_term = get_option( 'pswc_sort_term' );
    }

    is_array( $pswc_sort_term ) ? '' : $pswc_sort_term = array();
    return $pswc_sort_term;
}

