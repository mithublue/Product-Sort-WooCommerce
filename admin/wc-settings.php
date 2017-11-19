<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PSWC_Settings {

    public static function init() {
        add_filter( 'woocommerce_get_sections_products', array( __CLASS__, 'add_prodcut_sort_settings_section' ) );
        add_filter( 'woocommerce_get_settings_products', array( __CLASS__, 'prodcut_sort_settings' ), 10, 2 );
    }

    /**
     * Add settings tab for product sort
     * @param $sections
     * @return mixed
     */
    public static function add_prodcut_sort_settings_section( $sections ) {
        $sections['pswc_product_sort'] = __( 'Product sort', 'pswc' );
        return $sections;
    }

    public static function prodcut_sort_settings( $settings, $current_section ) {

        //pri(get_option('pswc_settings'));
        /**
         * Check the current section is what we want
         **/
        if ( $current_section == 'pswc_product_sort' ) {
            $sort_settings = array();
            // Add Title to the Settings
            $sort_settings[] = array( 'name' => __( 'WC Product Sort Settings', 'pswc' ),
                'type' => 'title',
                'desc' => __( 'The following options are used to control product sort', 'pswc' ),
                'id' => 'pswc_title' );
            // Add first checkbox option
            $sort_settings[] = array(
                'name'     => __( 'Sort by popularity', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[popularity]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable sorting by popularity', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for descending average rating sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[popularity]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Sort by popularity', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Sort by descending average rating', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[rating]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable sorting by average rating in descending order', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for descending average rating sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[rating]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Sort by average rating ( descending )', 'pswc' )
            );
            //ascending rating
            $sort_settings[] = array(
                'name'     => __( 'Sort by ascending average rating', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[rating-asc]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable sorting by average rating in ascending order', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for ascending average rating sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[rating-asc]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Sort by average rating ( ascending )', 'pswc' )
            );

            $sort_settings[] = array(
                'name'     => __( 'Sort by ascending average rating', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[rating-asc]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable sorting by ascending average rating', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for ascending average rating sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[rating-asc]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Sort by average rating ( ascending )', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for alphabetic ascending sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[title_ascending]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Alphabetically, A-Z', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Alphabetic Ascending sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[title_ascending]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable alphabetic ascending sorting', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for alphabetic ascending sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[title_ascending]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Alphabetically, A-Z', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Alphabetic descending sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[title_descending]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable alphabetic descending sorting', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for alphabetic descending sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[title_descending]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Alphabetically, Z-A', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Date : new to old', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[date]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable descending sorting by date created', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for descending date sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[date]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Date, old to new', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Date : new to old', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[date-desc]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable ascending sorting by date created', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for ascending date sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[date-desc]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Date, new to old', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Price, low to high', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[price]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable ascending price sorting', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for ascending price sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[price]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Price, low to high', 'pswc' )
            );
            $sort_settings[] = array(
                'name'     => __( 'Price, high to low', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_term[price-desc]',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Check this to enable descending price sorting', 'pswc' ),
                'default'  => 'yes'
            );
            $sort_settings[] = array(
                'name'     => __( 'Label for descending price sorting', 'pswc' ),
                'desc_tip' => __( '', 'pswc' ),
                'id'       => 'pswc_sort_label[price-desc]',
                'type'     => 'text',
                'desc'     => __( 'This is the text shown in the dropdown for this sorting', 'pswc' ),
                'default'  => __( 'Price, high to low', 'pswc' )
            );


            $sort_settings[] = array( 'type' => 'sectionend', 'id' => 'wcslider' );
            return $sort_settings;

            /**
             * If not, return the standard settings
             **/
        }

        return $settings;
    }
}

PSWC_Settings::init();