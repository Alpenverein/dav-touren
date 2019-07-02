<?php


/**
 * This function generate the Shortcode [preise][/preise]
 * With that you can generate a new line with prices.
 *
 * @param $atts
 * @param null $content
 * @return string
 */
function preisliste_shortcode( $atts , $content = null ) {

    $output = '<div class="row">'.$content.'</div>';

    return $output;
}
add_shortcode( 'preise', 'preisliste_shortcode' );


// Add Shortcode
function preis_shortcode( $atts ) {


    $output = '';

    // Attributes
    $sc_price = shortcode_atts(
        array(
            'name' => '',
            'preis' => '',
            'beschreibung' => '',
        ),
        $atts
    );


    isset($sc_price['name']) ? $name = $sc_price['name'] : $name = '';
    isset($sc_price['price']) ? $price = $sc_price['price'] : $price = '';
    isset($sc_price['description']) ? $description = $sc_price['description'] : $description = '';

    $output .= '<div class="col-md-4 pt-4">
        <div class="card card-price bg-light">
          <div class="card-header bg-primary">
            <p class="price_name"></p>
          </div>
          <div class="card-body">
            <div class="price-body">
              <span class="price">72,- €</span>
              <p>Erwachsene ab dem 25. Lebensjahr</p>
              </table>
            </div>
          </div>
          </div>
        </div>';

    return $output;

}
add_shortcode( 'preis', 'preis_shortcode' );