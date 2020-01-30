<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}


/**
 * Return an array with all given parameters for the Tour-Query
 *
 * Return NULL, if there is no GET-Parameter given, or they are wrong.
 *
 * @param string $getString
 * @return array|null
 *
 */
function sortGetArray() {


        $return = array(
            'tourentyp' => array(),
            'tourenkategorie' => array(),
            'tourentechnik' => array(),
            'tourenkondition' => array(),
            'tourenleiter' => array()
        );

        parse_str($_SERVER['QUERY_STRING'], $queryParams);

        foreach ($queryParams as $key => $value) {
            switch ($key) {
                case 'tourentyp':
                    $return["tourentyp"] = explode(",", $value); 
                    break;
                case 'tourenkategorie':
                    $return["tourenkategorie"] = explode(",", $value); 
                    break;
                case 'tourentechnik':
                    $return["tourentechnik"] =  explode(",", $value);
                    break;
                case 'tourenkondition':
                    $return["tourenkondition"] = explode(",", $value);
                    break;
                case 'tourenleiter':
                    $return["tourenleiter"] = explode(",", $value); 
                    break;
            }
        }

    return $return;
}


function is_term_in_query($term, $value){
    $selected_terms = sortGetArray();
    return array_key_exists($term, $selected_terms) && in_array($value, $selected_terms[$term]);
}


function tourQuery($parameters = '') {

    if($parameters == '') {
        $queryParams = sortGetArray($_SERVER["QUERY_STRING"]);
    } else {
        $queryParams = $parameters;
    }

    $posts_per_page = 2; //get_theme_mod('dav_touren_counter', 10);
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $offset = ($paged - 1) * $posts_per_page;

    /*
    @fixme: für was war das gedacht? $tourhead_content wird gesetzt aber nie wieder verwendet

    if(get_theme_mod('dav_touren_pageid') != false) {$dav_pageid = get_theme_mod('dav_touren_pageid');}
    else {$dav_pageid = true;};

    if($dav_pageid != false) {

        $page_id = get_post($dav_pageid);
        $tourhead_title = $page_id->post_title;
        $tourhead_content = $page_id->post_content;
        $tourhead_content = apply_filters('the_content', $tourhead_content);
        $tourhead_content = str_replace(']]>', ']]>', $tourhead_content);

    }
    */


    $tax_query = array(
        'relation' => 'AND'
    );

    $meta_query = array(
            'relation' => 'AND',
            // Nur Touren, die auch sichtbar sind
            array(
                'key' => 'acf_tourvisible',
                'compare' => '==',
                'value' => '1',
                'type' => 'string')
        );


//Tourenart gesucht?
    if (isset($queryParams['tourentyp']) && !empty($queryParams['tourentyp'])) {
        array_push($tax_query, array(
            'taxonomy' => 'tourtype',
            'field' => 'slug',
            'terms' => $queryParams['tourentyp'])
        );
    }


//Tourenkategorie gesucht?
    if(isset($queryParams['tourenkategorie']) && !empty($queryParams['tourenkategorie'])) {
        array_push($tax_query, array(
            'taxonomy' => 'tourcategory',
            'field' => 'slug',
            'terms' => $queryParams['tourenkategorie'])
        );
    } 


//Tourentechnik gesucht?
    if(isset($queryParams['tourentechnik']) && !empty($queryParams['tourentechnik'])) {
        array_push($tax_query, array(
            'taxonomy' => 'tourtechnic',
            'field' => 'slug',
            'terms' => $queryParams['tourentechnik'])
        );
    }


//Tourenkondition gesucht?
    if(isset($queryParams['tourenkondition']) && !empty($queryParams['tourenkondition'])) {
        array_push($tax_query, array(
            'taxonomy' => 'tourcondition',
            'field' => 'slug',
            'terms' => $queryParams['tourenkondition'])
        );
    }


//Tourenleiter gesucht?
    if(isset($queryParams['tourenleiter']) && !empty($queryParams['tourenleiter'])) {
        $tourenpersona = array( 'relation' => 'OR');
        foreach ($queryParams['tourenleiter'] as $leiter) {
            $persona = get_page_by_path($leiter, '', 'personas');
            array_push($meta_query, array(
                'key' => 'acf_tourpersona',
                'compare' => '==',
                'value' => $persona->ID,
                'type' => 'string'
            ));
        }
    } 

//Alle Touren oder nur zukünftige?
    if(get_theme_mod('dav_touren_datenewer')) {
        $tour_dates = get_theme_mod('dav_touren_datenewer');
        array_push($meta_query, array(
            'key' => 'acf_tourstartdate',
            'value' => date('Ymd', strtotime('-8 hours')),
            'compare' => '>=',
            'type' => 'DATE'
        ));
    } 


    $args = array(
        'post_type' => 'touren',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'offset' => $offset,
        'meta_key' => 'acf_tourstartdate',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'tax_query' => $tax_query,
        'meta_query' => $meta_query
    );

    return $args;
}


function remove_value_from_querystring($arg, $value){
    $values = explode(",", $_GET[$arg]);
    $new_values = array_diff($values, array($value));
    if(count($new_values) >= 1){
        return add_query_arg($arg, implode(",", $new_values));    
    } else {
        return remove_query_arg($arg);
    }
}


function add_value_to_querystring($arg, $value) {
    if(array_key_exists($arg, $_GET)){
        $values = explode(",", $_GET[$arg]);
        array_push($values, trim($value));
        return add_query_arg($arg, urlencode(implode(",", $values)));
    } else {
        return add_query_arg($arg, urlencode($value));
    }
}


function getResetFilter() {

    $return = '';
    $return .= '<div class="row">';
    $return .= '<div class="col-12">';
    $return .= '<strong>Aktive Filter: </strong>';

    parse_str($_SERVER['QUERY_STRING'], $query_params);
    foreach($query_params as $arg => $val){
        $values = explode(",", $val);
        foreach($values as $value){
            $return .= '<a class="btn btn-primary btn-sm btn-tourenfilter" href="' . 
                preg_replace('/\/page\/[0-9]*/', "", remove_value_from_querystring( $arg, $value ))
                . '"><i class="fa fa-times"></i> ' . ucwords($value).'</a>';    
        }
    }

    $return .= '</div>';
    $return .= '</div>';

    return $return;
}


