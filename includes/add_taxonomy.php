<?php

// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}


// Register Custom Taxonomy
function tourcategory_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Tourenkategorien', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Tourenkategorie', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Tourkategorie', 'text_domain' ),
        'all_items'                  => __( 'Alle Kategorien', 'text_domain' ),
        'parent_item'                => __( 'Elternkategorie', 'text_domain' ),
        'parent_item_colon'          => __( 'Elternkategorie:', 'text_domain' ),
        'new_item_name'              => __( 'Name der Tourkategorie', 'text_domain' ),
        'add_new_item'               => __( 'Neue Tourkategorie', 'text_domain' ),
        'edit_item'                  => __( 'Tourkategorie bearbeiten', 'text_domain' ),
        'update_item'                => __( 'Tourkategorie updaten', 'text_domain' ),
        'view_item'                  => __( 'Tourkategorie anschauen', 'text_domain' ),
        'separate_items_with_commas' => __( 'Mehrere Elemente mit Komma trennen', 'text_domain' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder entfernen', 'text_domain' ),
        'choose_from_most_used'      => __( 'Meistgewählte aussuchen', 'text_domain' ),
        'popular_items'              => __( 'Populäre Kategorien', 'text_domain' ),
        'search_items'               => __( 'Kategorien suchen', 'text_domain' ),
        'not_found'                  => __( 'Nicht gefunden', 'text_domain' ),
        'no_terms'                   => __( 'Keine Kategorien', 'text_domain' ),
        'items_list'                 => __( 'Kategorieliste', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );

    $rewrite = array(
        'slug'                       => 'tourart',
        'with_front'                 => true,
        'hierarchical'               => false,
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => $rewrite,
        'show_in_rest'               => true,
        'capabilities'              => array ('assign_terms'  => 'edit_tourens'),
    );
    register_taxonomy( 'tourcategory', array( 'touren' ), $args );

}


// Register Custom Taxonomy
function tourtype_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Tourenart', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Tourenart', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Tourenarten', 'text_domain' ),
        'all_items'                  => __( 'Alle Arten', 'text_domain' ),
        'parent_item'                => __( 'Übergeordnete Art', 'text_domain' ),
        'parent_item_colon'          => __( 'Übergeordnete Art:', 'text_domain' ),
        'new_item_name'              => __( 'Name der Tourenart', 'text_domain' ),
        'add_new_item'               => __( 'Neue Art von Touren anlegen', 'text_domain' ),
        'edit_item'                  => __( 'Tourenart bearbeiten', 'text_domain' ),
        'update_item'                => __( 'Tourenart updaten', 'text_domain' ),
        'view_item'                  => __( 'Tourart anschauen', 'text_domain' ),
        'separate_items_with_commas' => __( 'Mehrere Elemente mit Komma trennen', 'text_domain' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder entfernen', 'text_domain' ),
        'choose_from_most_used'      => __( 'Meistgewählte aussuchen', 'text_domain' ),
        'popular_items'              => __( 'Populäre Tourarten', 'text_domain' ),
        'search_items'               => __( 'Tourarten suchen', 'text_domain' ),
        'not_found'                  => __( 'Nicht gefunden', 'text_domain' ),
        'no_terms'                   => __( 'Keine Tourarten', 'text_domain' ),
        'items_list'                 => __( 'Tourenartliste', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );

    $rewrite = array(
        'slug'                       => 'tourdauer',
        'with_front'                 => true,
        'hierarchical'               => false,
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => $rewrite,
        'show_in_rest'               => true,
        'capabilities'              => array ('assign_terms'  => 'edit_tourens'),
    );
    register_taxonomy( 'tourtype', array( 'touren' ), $args );

}


// Register Custom Taxonomy
function tourtechnic_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Technik', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Technik', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Technik', 'text_domain' ),
        'all_items'                  => __( 'Erforderliche Technik', 'text_domain' ),
        'parent_item'                => __( 'Übergeordnete Art', 'text_domain' ),
        'parent_item_colon'          => __( 'Übergeordnete Art:', 'text_domain' ),
        'new_item_name'              => __( 'Name der Tourenart', 'text_domain' ),
        'add_new_item'               => __( 'Neue Art von Touren anlegen', 'text_domain' ),
        'edit_item'                  => __( 'Tourenart bearbeiten', 'text_domain' ),
        'update_item'                => __( 'Tourenart updaten', 'text_domain' ),
        'view_item'                  => __( 'Tourart anschauen', 'text_domain' ),
        'separate_items_with_commas' => __( 'Mehrere Elemente mit Komma trennen', 'text_domain' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder entfernen', 'text_domain' ),
        'choose_from_most_used'      => __( 'Meistgewählte aussuchen', 'text_domain' ),
        'popular_items'              => __( 'Populäre Tourarten', 'text_domain' ),
        'search_items'               => __( 'Tourarten suchen', 'text_domain' ),
        'not_found'                  => __( 'Nicht gefunden', 'text_domain' ),
        'no_terms'                   => __( 'Keine Tourarten', 'text_domain' ),
        'items_list'                 => __( 'Tourenartliste', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => false,
        'show_in_rest'               => true,
        'capabilities'              => array ('assign_terms'  => 'edit_tourens'),

    );
    register_taxonomy( 'tourtechnic', array( 'touren' ), $args );

}

// Register Custom Taxonomy
function tourcondition_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Kondition', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Kondition', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Konditionen', 'text_domain' ),
        'all_items'                  => __( 'Erforderliche Technik', 'text_domain' ),
        'parent_item'                => __( 'Übergeordnete Art', 'text_domain' ),
        'parent_item_colon'          => __( 'Übergeordnete Art:', 'text_domain' ),
        'new_item_name'              => __( 'Name der Tourenart', 'text_domain' ),
        'add_new_item'               => __( 'Neue Art von Touren anlegen', 'text_domain' ),
        'edit_item'                  => __( 'Tourenart bearbeiten', 'text_domain' ),
        'update_item'                => __( 'Tourenart updaten', 'text_domain' ),
        'view_item'                  => __( 'Tourart anschauen', 'text_domain' ),
        'separate_items_with_commas' => __( 'Mehrere Elemente mit Komma trennen', 'text_domain' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder entfernen', 'text_domain' ),
        'choose_from_most_used'      => __( 'Meistgewählte aussuchen', 'text_domain' ),
        'popular_items'              => __( 'Populäre Tourarten', 'text_domain' ),
        'search_items'               => __( 'Tourarten suchen', 'text_domain' ),
        'not_found'                  => __( 'Nicht gefunden', 'text_domain' ),
        'no_terms'                   => __( 'Keine Tourarten', 'text_domain' ),
        'items_list'                 => __( 'Tourenartliste', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => false,
        'show_in_rest'               => true,
        'capabilities'              => array ('assign_terms'  => 'edit_tourens'),
    );
    register_taxonomy( 'tourcondition', array( 'touren' ), $args );

}

add_action( 'init', 'tourcondition_taxonomy', 0 );
add_action( 'init', 'tourtechnic_taxonomy', 0 );
add_action( 'init', 'tourtype_taxonomy', 0 );
add_action( 'init', 'tourcategory_taxonomy', 0 );



//add a photo to taxonomy Tourenkategorie

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Taxonomy_Term_Image' ) ) :

    class Taxonomy_Term_Image {

        // object version used for enqueuing scripts
        private $version = '2.0.3';

        // url for the directory where our js is located
        private $js_dir_url;

        // array of slugs for the taxonomies we are targeting
        // api: use filter 'taxonomy-term-image-taxonomy' to override
        private $taxonomies = array( 'tourcategory','tourtechnic','tourcondition','tourtype' );

        // defined during __construct() for i18n reasons
        // api: use filter 'taxonomy-term-image-labels' to override
        private $labels = array();

        // @deprecated: option_name for pre-term-meta data storage
        // api: use filter 'taxonomy-term-image-option-name' to override
        private $option_name = '';

        // our term meta key
        // api: use filter 'taxonomy-term-image-meta-key' to override
        private $term_meta_key = 'term_image';

        /**
         * Simple singleton to enforce one instance
         *
         * @return Taxonomy_Term_Image object
         */
        static function instance() {
            static $object = null;
            if ( is_null( $object ) ) {
                $object = new Taxonomy_Term_Image();
            }
            return $object;
        }

        // prevent cloning
        private function __clone(){}

        // prevent unserialization
        public function __wakeup(){}

        /**
         * Init the plugin and hook into WordPress
         */
        private function __construct() {
            // default labels
            $this->labels = array(
                'fieldTitle'       => __( 'Kategorie-Bild' ),
                'fieldDescription' => __( 'Bitte ein Bild für die Kategorie auswählen.' ),
                'imageButton'      => __( 'Bild auswählen' ),
                'removeButton'     => __( 'Entfernen' ),
                'modalTitle'       => __( 'Kategorie-Bild auswählen oder hochladen' ),
                'modalButton'      => __( 'Attach' ),
                'adminColumnTitle' => __( 'Bild' ),
            );

            // allow overriding of the html text
            $this->labels = apply_filters( 'taxonomy-term-image-labels', $this->labels );

            // allow overriding of the target taxonomies
            $this->taxonomies = apply_filters( 'taxonomy-term-image-taxonomy', $this->taxonomies );

            if ( ! is_array( $this->taxonomies ) ) {
                $this->taxonomies = array( $this->taxonomies );
            }

            // @deprecated: allow overriding of option_name
            // default option name keyed to the taxonomy
            $this->option_name = $this->taxonomies[0] . '_term_images';
            $this->option_name = apply_filters( 'taxonomy-term-image-option-name', $this->option_name );

            // allow overriding of term_meta
            $this->term_meta_key = apply_filters( 'taxonomy-term-image-meta-key', $this->term_meta_key );

            // get our js location for enqueing scripts
            $this->js_dir_url = apply_filters( 'taxonomy-term-image-js-dir-url', plugin_dir_url( __FILE__ ) . '/js' );

            // hook into WordPress
            $this->hook_up();
        }


        /**
         * Hook into WordPress
         */
        private function hook_up(){
            // register our term meta and sanitize as an integer
            register_meta( 'term', $this->term_meta_key, 'absint' );

            // add our data when term is retrieved
            add_filter( 'get_term', array( $this, 'get_term' ) );
            add_filter( 'get_terms', array( $this, 'get_terms' ) );
            add_filter( 'get_object_terms', array( $this, 'get_terms' ) );

            // we only need to add most hooks on the admin side
            if ( is_admin() ) {
                add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

                foreach ( $this->taxonomies as $taxonomy ) {
                    // add our image field to the taxonomy term forms
                    add_action( $taxonomy . '_add_form_fields', array( $this, 'taxonomy_add_form' ) );
                    add_action( $taxonomy . '_edit_form_fields', array( $this, 'taxonomy_edit_form' ) );

                    // hook into term administration actions
                    add_action( 'create_' . $taxonomy, array( $this, 'taxonomy_term_form_save' ) );
                    add_action( 'edit_' . $taxonomy, array( $this, 'taxonomy_term_form_save' ) );

                    // custom admin taxonomy term list columns
                    add_filter( 'manage_edit-' . $taxonomy . '_columns',  array( $this, 'taxonomy_term_column_image' ) );
                    add_filter( 'manage_' . $taxonomy . '_custom_column', array( $this, 'taxonomy_term_column_image_content' ), 10, 3 );
                }
            }
        }

        /**
         * Add a new column to enabled taxonomy admin pages that show the chosen
         * image.
         *
         * @param $columns
         *
         * @return mixed
         */
        function taxonomy_term_column_image( $columns ){
            $columns['term_image'] = $this->labels['adminColumnTitle'];

            return $columns;
        }

        /**
         * Show the selected term image within the newly created admin column
         *
         * @param $content
         * @param $column_name
         * @param $term_id
         *
         * @return mixed
         */
        function taxonomy_term_column_image_content( $content, $column_name, $term_id ){
            if ( 'term_image' == $column_name ){
                $term = get_term( $term_id );

                if ( $term->term_image ) {
                    $content = wp_get_attachment_image( $term->term_image, 'thumbnail', false, array( 'style' => 'max-width:100%; height:auto;' ) );
                }
            }
            return $content;
        }


        /**
         * Add the image data to any relevant get_term() call.  Double duty as a
         * helper function for this->get_terms().
         *
         * @param $_term
         * @return object
         */
        function get_term( $_term ) {
            // only modify term when dealing with our taxonomies
            if ( is_object( $_term ) && in_array( $_term->taxonomy, $this->taxonomies ) ) {

                // default to null if not found
                $image_id = get_term_meta( $_term->term_id, $this->term_meta_key, true );
                $_term->term_image = !empty( $image_id ) ? $image_id : null;
            }
            return $_term;
        }

        /**
         * Add term_image data to objects when get_terms() or wp_get_object_terms()
         * is called.
         *
         * @param $terms
         * @return array
         */
        function get_terms( $terms ) {
            foreach( $terms as $i => $term ){
                if ( is_object( $term ) && !empty( $term->taxonomy ) ) {
                    $terms[ $i ] = $this->get_term( $term );
                }
            }
            return $terms;
        }

        /**
         * WordPress action "admin_enqueue_scripts"
         */
        function admin_enqueue_scripts(){
            // get the screen object to decide if we want to inject our scripts
            $screen = get_current_screen();

            // check if we are on any edit-{taxonomy} screen
            foreach( $this->taxonomies as $taxonomy ) {
                if ( $screen->id == 'edit-' . $taxonomy ){
                    // WP core stuff we need
                    wp_enqueue_media();
                    wp_enqueue_style( 'thickbox' );

                    // register our custom script
                    wp_register_script( 'taxonomy-term-image-js', $this->js_dir_url . '/taxonomy-term-image.js', array( 'jquery', 'thickbox', 'media-upload' ), $this->version, true );

                    // Localize the modal window text so it can be translated
                    wp_localize_script( 'taxonomy-term-image-js', 'TaxonomyTermImageText', $this->labels );

                    // enqueue the registered and localized script
                    wp_enqueue_script( 'taxonomy-term-image-js' );
                    break;
                }
            }
        }

        /**
         * The HTML form for our taxonomy image field
         *
         * @param  int    $image_ID  the image ID
         * @return string the html output for the image form
         */
        function taxonomy_term_image_field( $image_ID = null ) {
            $image_src = ( $image_ID ) ? wp_get_attachment_image_src( $image_ID, 'thumbnail' ) : array();

            wp_nonce_field( 'taxonomy-term-image-form-save', 'taxonomy-term-image-save-form-nonce' );
            ?>
            <input type="button" class="taxonomy-term-image-attach button" value="<?php echo esc_attr( $this->labels['imageButton'] ); ?>" />
            <input type="button" class="taxonomy-term-image-remove button" value="<?php echo esc_attr( $this->labels['removeButton'] ); ?>" />
            <input type="hidden" id="taxonomy-term-image-id" name="taxonomy_term_image" value="<?php echo esc_attr( $image_ID ); ?>" />
            <p class="description"><?php echo $this->labels['fieldDescription']; ?></p>

            <p id="taxonomy-term-image-container">
                <?php if ( isset( $image_src[0] ) ) : ?>
                    <img class="taxonomy-term-image-attach" src="<?php print esc_attr( $image_src[0] ); ?>" />
                <?php endif; ?>
            </p>
            <?php
        }

        /**
         * Add a new form field for the add taxonomy term form
         */
        function taxonomy_add_form(){
            ?>
            <div class="form-field term-image-wrap">
                <label><?php echo $this->labels['fieldTitle']; ?></label>
                <?php $this->taxonomy_term_image_field(); ?>
            </div>
            <?php
        }

        /**
         * Add a new form field for the edit taxonomy term form
         *
         * @param $term | object | the term object
         */
        function taxonomy_edit_form( $term ){
            // ensure we have our term_image data
            if ( !isset( $term->term_image ) ){
                $term = $this->get_term( $term, $term->taxonomy );
            }
            ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label><?php echo $this->labels['fieldTitle']; ?></label></th>
                <td class="taxonomy-term-image-row">
                    <?php $this->taxonomy_term_image_field( $term->term_image ); ?>
                </td>
            </tr>
            <?php
        }

        /**
         * Handle saving our custom taxonomy term meta
         *
         * @param $term_id
         */
        function taxonomy_term_form_save( $term_id ) {
            // our requirements for saving:
            if (
                // nonce was submitted and is verified
                isset( $_POST['taxonomy-term-image-save-form-nonce'] ) &&
                wp_verify_nonce( $_POST['taxonomy-term-image-save-form-nonce'], 'taxonomy-term-image-form-save' ) &&

                // taxonomy data and taxonomy_term_image data was submitted
                isset( $_POST['taxonomy'] ) &&
                isset( $_POST['taxonomy_term_image'] ) &&

                // the taxonomy submitted is one of the taxonomies we are dealing with
                in_array( $_POST['taxonomy'], $this->taxonomies )
            )
            {
                // get the term_meta and assign it the old_image
                $old_image = get_term_meta( $term_id, $this->term_meta_key, true );

                // sanitize the data and save it as the new_image
                $new_image = absint( $_POST['taxonomy_term_image'] );

                // if an image was removed, delete the meta data
                if ( $old_image && '' === $new_image ) {
                    delete_term_meta( $term_id, $this->term_meta_key );
                }
                // if the new image is not the same as the old update the term_meta
                else if ( $old_image !== $new_image ) {
                    update_term_meta( $term_id, $this->term_meta_key, $new_image );
                }
            }
        }
    }

endif;

/**
 * Initialize the plugin by calling for its instance on WordPress action 'init'
 */
function taxonomy_term_image_init() {
    Taxonomy_Term_Image::instance();
}
add_action( 'init', 'taxonomy_term_image_init' );
