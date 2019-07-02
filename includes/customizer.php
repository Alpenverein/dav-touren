<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}


//register a new section in the customizer
function dav_touren_customize_register( $wp_customize) {

    $wp_customize->add_panel( 'dav_touren', array(
        'priority'       => 60,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Optionen des Tourenplugins', 'dav'),
        'description'    => __('Einstellmöglichkeiten für die Tourenübersicht. Sie können die Brotkrümmelnavigation und die Seiteninhalte einstellen.<br>Mehr Informationen finden sie in den <a href="https://template.alpenverein.de/index.php/wissen/die-startseite-anpassen/">FAQ zur Website</a>.', 'dav'),
    ) );
    $wp_customize->add_section( 'dav_page_section' , array(
        'title'       => __( 'Seitenlayout', 'dav_custom_widgets' ),
        'priority'    => 10,
        'description' => 'Über den Touren kann ein beliebiger Seiteninhalt ausgegeben werden. Außerdem kann das Brotkrümel-Navigation angepasst werden.',
        'panel' => 'dav_touren',
    ));

    $wp_customize->add_section( 'dav_tourlist_section' , array(
        'title'       => __( 'Tourenliste', 'dav_custom_widgets' ),
        'priority'    => 20,
        'description' => 'Die Tourenliste kann angepasst werden.',
        'panel' => 'dav_touren',
    ));

    $wp_customize->add_setting( 'dav_touren_pageid', array('default' => '',));
    $wp_customize->add_setting( 'dav_touren_breadcrumb', array('default' => '',));
    $wp_customize->add_setting( 'dav_touren_counter', array('default' => '',));
    $wp_customize->add_setting( 'dav_touren_datenewer', array('default' => false));

    $wp_customize->add_control( 'dav_touren_pageid', array(
        'label' => __( 'Seiten-ID', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird über den Touren kein zusätzlicher Text angezeigt.',
        'section' => 'dav_page_section',
        'type' => 'text',
        'settings' => 'dav_touren_pageid'
    ));

    $wp_customize->add_control( 'dav_touren_breadcrumb', array(
        'label' => __( 'Brotkrümmel-Titel', 'dav' ),
        'description' => 'Wenn hier nichts eingetragen wird, wird in der Brotkrümmel-Navigation "Touren" als Seitenname eingetragen. Ansonsten der hier gewählte Text.',
        'section' => 'dav_page_section',
        'type' => 'text',
        'settings' => 'dav_touren_breadcrumb'
    ));

    $wp_customize->add_control( 'dav_touren_counter', array(
        'label' => __( 'Anzahl der Touren je Seite', 'dav' ),
        'description' => 'Standardmäßig werden 10 Touren je Seite angezeigt. Dieser Wert kann hier verändert werden.',
        'section' => 'dav_tourlist_section',
        'type' => 'text',
        'settings' => 'dav_touren_counter'
    ));


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_touren_datenewer', array(
        'label'          => __( 'Nur Touren anzeigen, die in der Zukunft liegen', 'dav' ),
        'section'        => 'dav_tourlist_section',
        'settings'       => 'dav_touren_datenewer',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Alle Touren anzeigen'),
            'true'   => __( 'Nur zukünftige Touren anzeigen' )
        )
    )));


}

add_action( 'customize_register', 'dav_touren_customize_register' );