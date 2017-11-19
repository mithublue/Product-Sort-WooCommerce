<?php
//custom product sort
add_filter( 'woocommerce_get_catalog_ordering_args', 'pswc_custom_woocommerce_get_catalog_ordering_args' );
function pswc_custom_woocommerce_get_catalog_ordering_args( $args ) {

    global $pswc_sort_term,$pswc_sort_label;

    if( empty( $pswc_sort_term ) ) {
        $pswc_sort_term = get_option( 'pswc_sort_term' );
    }

    if( empty( $pswc_sort_label ) ) {
        $pswc_sort_label = get_option( 'pswc_sort_label' );
    }

    $orderby_slug = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );


    //default
    if( $pswc_sort_term['popularity'] == 'yes' ) {
        if ( 'popularity' == $orderby_slug ) {
            return $args;
        }

    }

    //default
    if( $pswc_sort_term['rating'] == 'yes' ) {
        if ( 'rating' == $orderby_slug ) {
            return $args;
        }

    }

    if( $pswc_sort_term['rating-asc'] == 'yes' ) {
        if ( 'rating-asc' == $orderby_slug ) {
            $args['orderby'] = array(
                'meta_value_num' => 'ASC',
                'ID' => 'ASC'
            );
            $args['order'] = 'ASC';
            $args['meta_key'] = '_wc_average_rating';
        }
    }

    if( $pswc_sort_term['title_ascending'] == 'yes' ) {
        if ( 'title_ascending' == $orderby_slug ) {
            $args['orderby'] = $pswc_sort_label['title_ascending'];
            $args['order'] = 'ASC';
            $args['meta_key'] = '';
        }
    }

    if( $pswc_sort_term['title_descending'] == 'yes' ) {
        if ( 'title_descending' == $orderby_slug ) {
            $args['orderby'] = 'title';
            $args['order'] = 'DESC';
            $args['meta_key'] = '';
        }
    }

    if( $pswc_sort_term['date'] == 'yes' ) {
        if ( 'date' == $orderby_slug ) {
            $args['orderby'] = 'date';
            $args['order'] = 'ASC';
            $args['meta_key'] = '';
        }
    }

    if( $pswc_sort_term['date-desc'] == 'yes' ) {
        if ( 'date-desc' == $orderby_slug ) {
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            $args['meta_key'] = '';
        }
    }

    if( $pswc_sort_term['price'] == 'yes' ) {
        if ( 'price' == $orderby_slug ) {
            $args['orderby'] = 'price';
            $args['order'] = 'ASC';
            $args['meta_key'] = '';
        }
    }

    if( $pswc_sort_term['price-desc'] == 'yes' ) {
        if ( 'price-desc' == $orderby_slug ) {
            $args['orderby'] = 'price';
            $args['order'] = 'DESC';
            $args['meta_key'] = '';
        }
    }

    return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'pswc_custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'pswc_custom_woocommerce_catalog_orderby' );
function pswc_custom_woocommerce_catalog_orderby( $sortby ) {

    global $pswc_sort_term,$pswc_sort_label;

    if( empty( $pswc_sort_term ) ) {
        $pswc_sort_term = get_option( 'pswc_sort_term' );
    }

    if( empty( $pswc_sort_label ) ) {
        $pswc_sort_label = get_option( 'pswc_sort_label' );
    }


    unset($sortby['date']);
    unset($sortby['price']);
    unset($sortby['price-desc']);
    unset( $sortby['rating'] );

    //for reset
    foreach ( $pswc_sort_term as $slug => $val ) {
        if( $val == 'yes' ) {
            $sortby[$slug] = $pswc_sort_label[$slug];
        }
    }

    return $sortby;
}

