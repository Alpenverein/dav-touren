<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}

function tourQuery($parameter = '') {

    global $wp;
    if(get_theme_mod('dav_touren_counter') != false) {$pagecount = get_theme_mod('dav_touren_counter');}
    else {$pagecount = 10;};

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $offset = ($paged - 1) * $pagecount;


    if($paged > 1) {

        $pattern = '/page\/\d/';
        //$current_url = preg_replace($pattern,'',$current_url);

    }

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
            'compare' => '>=',
            'value' => date('Ymd', strtotime('-8 hours')),
            'type' => 'DATE',);

    }


//Tourenart gesucht?
    if (isset($_GET['tourentyp'])) {

        $tourenart = array(
            'taxonomy' => 'tourtype',
            'field' => 'slug',
            'terms' => $_GET['tourentyp']);

    } else {$tourenart = '';}


//Tourenkategorie gesucht?
    if(isset($_GET['tourenkategorie'])) {

        $tourentyp = array(
            'taxonomy' => 'tourcategory',
            'field' => 'slug',
            'terms' => $_GET['tourenkategorie']);

    } else {$tourentyp = '';}




//Tourentechnik gesucht?
    if(isset($_GET['tourentechnik'])) {

        $tourentechnik = array(
            'taxonomy' => 'tourtechnic',
            'field' => 'slug',
            'terms' => $_GET['tourentechnik']);

    } else {$tourentechnik = '';}


//Tourenkondition gesucht?
    if(isset($_GET['tourenkondition'])) {

        $tourenkondition = array(
            'taxonomy' => 'tourcondition',
            'field' => 'slug',
            'terms' => $_GET['tourenkondition']);

    } else {$tourenkondition = '';}


//Tourenleiter gesucht?
    if(isset($_GET['tourenleiter'])) {

        $persona_id = get_page_by_path($_GET['tourenleiter'], '', 'personas');
        $persona_id = $persona_id->ID;

        $tourenpersona = array(
            'key' => 'acf_tourpersona',
            'compare' => '==',
            'value' => $persona_id,
            'type' => 'string',);

    } else {$tourenpersona = '';}


    $tourensichtbarkeit = array(
        'key' => 'acf_tourvisible',
        'compare' => '==',
        'value' => '1',
        'type' => 'string',
    );

    $args = array(
        'post_type' => 'touren',
        'posts_per_page' => $pagecount,
        'paged' => $paged,
        'offset' => $offset,
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
            $tourenpersona,
            $tourenzukunft,
            $tourensichtbarkeit,
        )
    );


    return $args;

};