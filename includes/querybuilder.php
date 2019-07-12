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
function sortGetArray($getString = '') {

    $return = null;


    if ($getString != '') {


        $typ = array();
        $kategorie = array();
        $technik = array();
        $schwierigkeit = array();
        $leiter = array();


        $elements = explode('&',$getString);

        foreach ($elements as $element) {

            $element = explode('=', $element);

            switch ($element[0]) {

                case 'tourenkategorie': $kategorie[] = $element[1]; break;
                case 'tourentyp' : $typ[] = $element[1]; break;
                case 'tourentechnik' :$technik[] = $element[1]; break;
                case 'tourenkondition' : $schwierigkeit[] = $element[1]; break;
                case 'tourenleiter' : $leiter[] = $element[1]; break;
            }

            $return = array(
                'typ' => $typ,
                'kategorie' => $kategorie,
                'technik' => $technik,
                'kondition' => $schwierigkeit,
                'leiter' => $leiter);

        }

    } else {

        $return = null;

    }


    return $return;

}



function tourQuery($parameters = '') {


    if($parameters == '') {
        $queryParams = sortGetArray($_SERVER["QUERY_STRING"]);
    } else {
        $queryParams = $parameters;
    }

    global $wp;
    if(get_theme_mod('dav_touren_counter') != false) {$pagecount = get_theme_mod('dav_touren_counter');}
    else {$pagecount = 10;};

    //$paged = get_query_var('paged') ? get_query_var('paged') : 1;

    if (get_query_var('paged')):
        $paged = get_query_var('paged');
    elseif (get_query_var('page')):
        $paged = get_query_var('page');
    else:
        $paged = 1;
    endif;

    $offset = ($paged - 2) * $pagecount;



    if(get_theme_mod('dav_touren_pageid') != false) {$dav_pageid = get_theme_mod('dav_touren_pageid');}
    else {$dav_pageid = true;};


    if($dav_pageid != false) {

        $page_id = get_post($dav_pageid);
        $tourhead_title = $page_id->post_title;
        $tourhead_content = $page_id->post_content;
        $tourhead_content = apply_filters('the_content', $tourhead_content);
        $tourhead_content = str_replace(']]>', ']]>', $tourhead_content);

    }

    $taxonomy = '';
    $term = '';

    $args = array();

    //Alle Touren oder nur zukünftige?
    if(get_theme_mod('dav_touren_datenewer')) {

        $tour_dates = get_theme_mod('dav_touren_datenewer');

    } else { $tour_dates = false; $tourenzukunft = ''; }

    if($tour_dates == true) {

        $tourenzukunft = array(
            'key' => 'acf_tourstartdate',
            'value' => date('Ymd', strtotime('-8 hours')),
            'compare' => '>=',
            'type' => 'DATE',);

    }


//Tourenart gesucht?
    if (isset($queryParams['typ']) && !empty($queryParams['typ'])) {

        $tourenart = array(
            'taxonomy' => 'tourtype',
            'field' => 'slug',
            'terms' => $queryParams['typ']);

    } else {$tourenart = '';}


//Tourenkategorie gesucht?
    if(isset($queryParams['kategorie']) && !empty($queryParams['kategorie'])) {

        $tourentyp = array(
            'taxonomy' => 'tourcategory',
            'field' => 'slug',
            'terms' => $queryParams['kategorie']);

    } else {$tourentyp = '';}




//Tourentechnik gesucht?
    if(isset($queryParams['technik']) && !empty($queryParams['technik'])) {

        $tourentechnik = array(
            'taxonomy' => 'tourtechnic',
            'field' => 'slug',
            'terms' => $queryParams['technik']);

    } else {$tourentechnik = '';}


//Tourenkondition gesucht?
    if(isset($queryParams['kondition']) && !empty($queryParams['kondition'])) {

        $tourenkondition = array(
            'taxonomy' => 'tourcondition',
            'field' => 'slug',
            'terms' => $queryParams['kondition']);

    } else {$tourenkondition = '';}


    // Nur Touren, die auch sichtbar sind
    $tourensichtbarkeit = array(
        'key' => 'acf_tourvisible',
        'compare' => '==',
        'value' => '1',
        'type' => 'string',
    );


    //Tourenleiter gesucht?
    if(isset($queryParams['leiter']) && !empty($queryParams['leiter'])) {

        $tourenpersona = array(
            'relation' => 'OR',);

        foreach ($queryParams['leiter'] as $leiter) {

            $persona = get_page_by_path($leiter, '', 'personas');;
            $persona_id = $persona->ID;

            array_push($tourenpersona, array(
                'key' => 'acf_tourpersona',
                'compare' => '==',
                'value' => $persona_id,
                'type' => 'string',
            ));

        }


    } else {$tourenpersona = '';}


    $args = array(
        'post_type' => 'touren',
        'posts_per_page' => $pagecount,
        'paged' => $paged,
        //'offset' => $offset,
        'meta_key' => 'acf_tourstartdate',
        'orderby' => 'meta_value',
        'order' => 'ASC',


        'tax_query' => array(
            'relation' => 'AND',
            $tourentyp,
            $tourenart,
            $tourenkondition,
            $tourentechnik,
        ),

        'meta_query' => array(
            'relation' => 'AND',
            $tourenzukunft,
            $tourensichtbarkeit,
            $tourenpersona,
        ),
    );


    return $args;

}



function resetFilter($currentURL) {

    $return = '';

    if($_SERVER["QUERY_STRING"] != '') {
        $parameter = explode('&', $_SERVER["QUERY_STRING"]);
    } else {
        $parameter = '';
    }


    if ($parameter != '') {


        $return .= '<div class="row">';
        $return .= '<div class="col-12">';


        $return .= '<a class="btn btn-default btn-sm btn-tourenfilter-red" href="'.$currentURL.'"><i class="fa fa-times"></i> Alle Filter löschen</a>';

        for($i = 0; $i < count($parameter); $i++) {

            $return .= '<a class="btn btn-default btn-sm btn-tourenfilter" href="'.$currentURL.'?';

            for ($j = 0; $j < count($parameter); $j++) {

                if($i != $j) {

                    $return .= $parameter[$j].'&';

                }

            }

            $return .= '"><i class="fa fa-times"></i> '.formatFilterText($parameter[$i]).'</a>';

        }


        $return .= '</div>';
        $return .= '</div>';

    }

    return $return;

}



function formatFilterText($string) {

    $stringArray = explode('=',$string);


    $return = str_replace('-',' ',$stringArray[1]);


    $return = ucwords($return);

    return $return;

}