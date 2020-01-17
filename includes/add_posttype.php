<?php


// Kein direkten Zugriff erlauben
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)))
{
    die('No direct calls allowed!');
}


// Register Custom Post Type
function cpt_tours() {

    $labels = array(
        'name'                  => _x( 'Touren', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Tour', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Touren', 'text_domain' ),
        'name_admin_bar'        => __( 'Touren', 'text_domain' ),
        'archives'              => __( 'Tourenarchiv', 'text_domain' ),
        'attributes'            => __( 'Tour-Eigenschaften', 'text_domain' ),
        'parent_item_colon'     => __( 'Elterntour', 'text_domain' ),
        'all_items'             => __( 'Alle Touren', 'text_domain' ),
        'add_new_item'          => __( 'Neue Tour anlegen', 'text_domain' ),
        'add_new'               => __( 'Neue Tour', 'text_domain' ),
        'new_item'              => __( 'Neue Tour', 'text_domain' ),
        'edit_item'             => __( 'Tour bearbeiten', 'text_domain' ),
        'update_item'           => __( 'Tour updaten', 'text_domain' ),
        'view_item'             => __( 'Tour anschauen', 'text_domain' ),
        'view_items'            => __( 'Touren anschauen', 'text_domain' ),
        'search_items'          => __( 'Tour suchen', 'text_domain' ),
        'not_found'             => __( 'Nicht gefunden', 'text_domain' ),
        'not_found_in_trash'    => __( 'Nicht im Papierkorb gefunden', 'text_domain' ),
        'featured_image'        => __( 'Tourfoto', 'text_domain' ),
        'set_featured_image'    => __( 'Tourfoto festlegen', 'text_domain' ),
        'remove_featured_image' => __( 'Tourfoto entfernen', 'text_domain' ),
        'use_featured_image'    => __( 'Als Tourfoto verwenden', 'text_domain' ),
        'insert_into_item'      => __( 'In Tour einfügen', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Upload zur Tour', 'text_domain' ),
        'items_list'            => __( 'Tourliste', 'text_domain' ),
        'items_list_navigation' => __( 'Tourliste', 'text_domain' ),
        'filter_items_list'     => __( 'Touren filtern', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Tour', 'text_domain' ),
        'description'           => __( 'Tourenliste', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor'),
        'taxonomies'            => array( 'tourtype', 'tourcategory' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-location-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
        'capability_type' => 'Touren',
        'capabilities' => array(
            'edit_others_posts'     => 'edit_others_tourens',
            'delete_others_posts'   => 'delete_others_tourens',
            'delete_private_posts'  => 'delete_private_tourens',
            'edit_private_posts'    => 'edit_private_tourens',
            'read_private_posts'    => 'read_private_tourens',
            'edit_published_posts'  => 'edit_published_tourens',
            'publish_posts'         => 'publish_tourens',
            'delete_published_posts'=> 'delete_published_tourens',
            'edit_posts'            => 'edit_tourens'   ,
            'delete_posts'          => 'delete_tourens',
            'edit_post'             => 'edit_touren',
            'read_post'             => 'read_touren',
            'delete_post'           => 'delete_touren',
        ),
        'map_meta_cap' => true,
    );
    register_post_type( 'touren', $args );

}
add_action( 'init', 'cpt_tours', 0 );