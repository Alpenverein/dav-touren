<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}



if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
'key' => 'group_5b7525e532c97',
'title' => 'Kompakte Toureninfo',
'fields' => array(
array(
'key' => 'field_5b745e321dae5',
'label' => 'Text',
'name' => 'acf_tourcompact',
'type' => 'text',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => 'Eine kurze Information zur Tour für die Übersicht. Hier können maximal 250 Zeichen eingegeben werden.',
'prepend' => '',
'append' => '',
'formatting' => 'html',
'maxlength' => '',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 0,
'position' => 'acf_after_title',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => array(
),
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b7525e5342c3',
'title' => 'Sichtbarkeit der Tour',
'fields' => array(
array(
'key' => 'field_5b745b671088e',
'label' => 'Öffentlich sichtbar',
'name' => 'acf_tourvisible',
'type' => 'radio',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'choices' => array(
0 => 'Nicht Öffentlich',
1 => 'Öffentlich anzeigen',
),
'allow_null' => 0,
'other_choice' => 0,
'default_value' => '1 : Öffentlich anzeigen',
'layout' => 'horizontal',
'return_format' => 'value',
'save_other_choice' => 0,
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 0,
'position' => 'acf_after_title',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b7525e535369',
'title' => 'Termin, Uhrzeit,Treffpunkt',
'fields' => array(
array(
'key' => 'field_5b7455c43e391',
'label' => 'Mehrtägige Tour',
'name' => 'acf_tourallday',
'type' => 'radio',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'choices' => array(
1 => 'Ja',
0 => 'Nein',
),
'other_choice' => 0,
'save_other_choice' => 0,
'default_value' => 0,
'layout' => 'horizontal',
'allow_null' => 0,
'return_format' => 'value',
),
array(
'key' => 'field_5b74554a3e38f',
'label' => 'Startdatum',
'name' => 'acf_tourstartdate',
'type' => 'date_picker',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'display_format' => 'd.m.Y',
'save_format' => '',
'first_day' => 1,
'return_format' => 'd/m/Y',
),
array(
'key' => 'field_5b7455883e390',
'label' => 'Enddatum',
'name' => 'acf_tourenddate',
'type' => 'date_picker',
'instructions' => '',
'required' => 0,
'conditional_logic' => array(
array(
array(
'field' => 'field_5b7455c43e391',
'operator' => '==',
'value' => '1',
),
),
),
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'display_format' => 'd.m.Y',
'save_format' => '',
'first_day' => 1,
'return_format' => 'd/m/Y',
),
array(
'key' => 'field_5b745ee3b5624',
'label' => 'Startzeit',
'name' => 'acf_tourtreffzeit',
'type' => 'text',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '12:00',
'placeholder' => '',
'prepend' => '',
'append' => '',
'formatting' => 'none',
'maxlength' => '',
),
array(
'key' => 'field_5b745f6ad25a7',
'label' => 'Treffpunkt',
'name' => 'acf_tourtreffpunkt',
'type' => 'text',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'formatting' => 'none',
'maxlength' => '',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 0,
'position' => 'side',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b7525e539d1f',
'title' => 'Tourenbild',
'fields' => array(
array(
'key' => 'field_5b745fec2410c',
'label' => 'Bild der Tour für Katalog und Übersicht',
'name' => 'acf_tourphoto',
'type' => 'image',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'preview_size' => 'medium',
'library' => 'all',
'return_format' => 'id',
'min_width' => 0,
'min_height' => 0,
'min_size' => 0,
'max_width' => 0,
'max_height' => 0,
'max_size' => 0,
'mime_types' => '',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => array(
),
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b7525e53bf50',
'title' => 'Tourenkommentar (nur intern)',
'fields' => array(
array(
'key' => 'field_5b745cab6b258',
'label' => 'Interne Notizen/Kommentare zur Tour',
'name' => 'acf_tourcommentsintern',
'type' => 'textarea',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'maxlength' => '',
'rows' => '',
'new_lines' => 'br',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => array(
),
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b7d12c629f46',
'title' => 'Zusatzmenü',
'fields' => array(
array(
'key' => 'field_5b7d17ecbb802',
'label' => 'Titel über der Linkliste',
'name' => 'page_linklist_title',
'type' => 'text',
'instructions' => 'Welcher Titel soll über der Linkliste stehen',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => 'Weitere Informationen zum Thema',
'placeholder' => '',
'prepend' => '',
'append' => '',
'maxlength' => '',
),
array(
'key' => 'field_5b7d12de1e527',
'label' => 'Linkliste',
'name' => 'page_linklist',
'type' => 'page_link',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'post_type' => array(
0 => 'page',
),
'taxonomy' => array(
),
'allow_null' => 0,
'allow_archives' => 1,
'multiple' => 1,
),
),
'location' => array(
array(
array(
'param' => 'page_template',
'operator' => '==',
'value' => 'default',
),
),
),
'menu_order' => 0,
'position' => 'side',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => 'Mit diesem Auswahlfeld können bestimmten Seiten beliebige Menüs hinzugefügt werden.',
));

acf_add_local_field_group(array(
'key' => 'group_5b7525e53e290',
'title' => 'Tourdaten',
'fields' => array(
array(
'key' => 'field_5b7458310f753',
'label' => 'Tourenleitung',
'name' => 'acf_tourpersona',
'type' => 'page_link',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'post_type' => array(
0 => 'personas',
),
'taxonomy' => array(
0 => 'personarole:tourenleiter',
    1 => 'personarole:tourenleiterin',
    2 => 'personarole:tourenleitung',
),
'allow_null' => 1,
'allow_archives' => 0,
'multiple' => 0,
),
array(
'key' => 'field_5b7457f1f14ed',
'label' => 'Dauer in Stunden',
'name' => 'acf_tourtime',
'type' => 'number',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '33.33',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'min' => '',
'max' => '',
'step' => '',
),
array(
'key' => 'field_5b74594751b27',
'label' => 'Höhenmeter',
'name' => 'acf_tourhohenmeter',
'type' => 'text',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '33.33',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'maxlength' => '',
),
array(
'key' => 'field_5b74596051b28',
'label' => 'Kilometer',
'name' => 'acf_tourkilometer',
'type' => 'text',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '33.33',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'maxlength' => '',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 2,
'position' => 'side',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => '',
));

acf_add_local_field_group(array(
'key' => 'group_5b8393660d0e4',
'title' => 'Tourenkennung (intern)',
'fields' => array(
array(
'key' => 'field_5b83937b2af36',
'label' => 'Interne Kennung (Katalognummer)',
'name' => 'tour_intern',
'type' => 'text',
'instructions' => 'Hier bitte die interne Kennung der Tour eingeben. Dies erleichtert dem Mitglied und euch die Kommunikation über wirklich "das Gleiche". :-)',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'maxlength' => '',
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'touren',
),
),
),
'menu_order' => 2,
'position' => 'acf_after_title',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => '',
));

endif;