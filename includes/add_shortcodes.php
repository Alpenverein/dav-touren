<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}


// Add Shortcode
function csc_tourlist( $atts )
{

    $return = '';

    // Attributes
    $atts = shortcode_atts(
        array(
            'leiter' => '',
            'kategorie' => '',
            'typ' => '',
            'technik' => '',
            'kondition' => '',
        ), $atts);

    $return .= '<div class="accordion tour-list" id="tourlist">';

    $the_query = new WP_Query(tourQuery(array('kategorie' => array($atts['kategorie']), 'leiter' => array($atts['leiter']))));

    $pagesum = $the_query->max_num_pages;

    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {

            $the_query->the_post();


            $return .= '<div class="card">';
            $return .= '<div class="card-header" id="heading' . get_the_ID() . '">';
            $return .= '<div class="d-flex">';
            $return .= '<div class="">';
            $return .= '<button class="tour-date" type="button" data-toggle="collapse" data-target="#collapse' . get_the_ID() . '">';
            $return .= '<span class="tour-day">';
            $return .= substr(get_field('acf_tourstartdate'), 0, 2) . '.' . substr(get_field('acf_tourstartdate'), 3, 2);
            $return .= '.';

            if ((get_field('acf_tourenddate') == true) && (get_field('acf_tourallday') == 1)) {

                $return .= '<br>-<br>';
                $return .= substr(get_field('acf_tourenddate'), 0, 2) . '.' . substr(get_field('acf_tourenddate'), 3, 2);
                $return .= '.';

            }

            $return .= '</span></button></div>';
            $return .= '<div class="flex-grow-1 pl-3" data-toggle="collapse" data-target="#collapse' . get_the_ID() . '">';
            $return .= '<h3>' . get_the_title() . '</h3><span class="tour-data">';

            $tour_type = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID, 'tourtype', '', ', '));
            $tour_category = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID, 'tourcategory', '', ', '));
            $tour_technic = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID, 'tourtechnic', '', ', '));
            $tour_condition = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID, 'tourcondition', '', ', '));

            if ($tour_type != '') {
                $return .= $tour_type;
            }
            if ($tour_category != '') {
                $return .= ' | ' . $tour_category;
            }
            if ($tour_technic != '') {
                $return .= ' | ' . $tour_technic;
            }
            if ($tour_condition != '') {
                $return .= ' | ' . $tour_condition;
            }


            $return .= '</span></div>';
            $return .= '<div class="justify-content-end">';
            $return .= '<button class="btn btn-transparent" type="button" data-toggle="collapse" data-target="#collapse' . get_the_ID() . '" aria-expanded="true" aria-controls="collapse' . get_the_ID() . '">';
            $return .= '<i class="fas fa-chevron-down"></i>';
            $return .= '</button>';
            $return .= '</div></div></div>';
            $return .= '<div id="collapse' . get_the_ID() . '" class="collapse" aria-labelledby="heading' . get_the_ID() . '" data-parent="#tourlist">';
            $return .= '<div class="card-body">' . get_field('acf_tourcompact') . '<a href="' . get_the_permalink() . '"><button class="btn btn-tourlist"><i class="fas fa-chevron-right"></i></button> </a>';
            $return .= '</div></div></div>';


        }

        $return .= '<div class="row mt-5">';
        $return .= '<div class="col-xs-12 col-sm-8 col-lg-9">';

        if (function_exists("pagination")) {
            $return .= pagination($pagesum);
        }

        $return .= '</div></div>';


    } else {

        $return .= '<div class="row">
                        <div class="col-12 mt-5">
                            <p>Für die gewünschte Auswahl haben wir aktuell leider keine Tour im Programm.</p>
                        </div>
                    </div>';

    }

            $return .= '</div>';

    return $return;
}
add_shortcode( 'tourenliste', 'csc_tourlist' );