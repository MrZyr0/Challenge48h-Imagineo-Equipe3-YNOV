<?php
function imagineo_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/print.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style-rtl.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'imagineo_styles');

function imagineo_fonts() {
    $fonts_folder_url = get_theme_root_uri() . '/imagineo/assets/fonts/';
?>
    <style>
    @font-face {
        font-family: 'amaticsc';
        src: url('<?php echo $fonts_folder_url ?>amaticsc.eot');
        src: url('<?php echo $fonts_folder_url ?>amaticsc.eot?#iefix') format('embedded-opentype'),
             url('<?php echo $fonts_folder_url ?>amaticsc.woff2') format('woff2'),
             url('<?php echo $fonts_folder_url ?>amaticsc.woff') format('woff'),
             url('<?php echo $fonts_folder_url ?>amaticsc.ttf') format('truetype'),
             url('<?php echo $fonts_folder_url ?>amaticsc.svg#amatic_scregular') format('svg');
        font-weight: normal;
        font-style: normal;
    
    }
    
    @font-face {
        font-family: 'centurygothic';
        src: url('<?php echo $fonts_folder_url ?>centurygothic.eot');
        src: url('<?php echo $fonts_folder_url ?>centurygothic.eot?#iefix') format('embedded-opentype'),
             url('<?php echo $fonts_folder_url ?>centurygothic.woff2') format('woff2'),
             url('<?php echo $fonts_folder_url ?>centurygothic.woff') format('woff'),
             url('<?php echo $fonts_folder_url ?>centurygothic.ttf') format('truetype'),
             url('<?php echo $fonts_folder_url ?>centurygothic.svg#century_gothicregular') format('svg');
        font-weight: normal;
        font-style: normal;
    
    }
    
    @font-face {
        font-family: 'didactgothic';
        src: url('<?php echo $fonts_folder_url ?>didactgothic.eot');
        src: url('<?php echo $fonts_folder_url ?>didactgothic.eot?#iefix') format('embedded-opentype'),
             url('<?php echo $fonts_folder_url ?>didactgothic.woff2') format('woff2'),
             url('<?php echo $fonts_folder_url ?>didactgothic.woff') format('woff'),
             url('<?php echo $fonts_folder_url ?>didactgothic.ttf') format('truetype'),
             url('<?php echo $fonts_folder_url ?>didactgothic.svg#didact_gothicregular') format('svg');
        font-weight: normal;
        font-style: normal;
    
    }
    
    @font-face {
        font-family: 'glacialindifference';
        src: url('<?php echo $fonts_folder_url ?>glacialindifference.eot');
        src: url('<?php echo $fonts_folder_url ?>glacialindifference.eot?#iefix') format('embedded-opentype'),
             url('<?php echo $fonts_folder_url ?>glacialindifference.woff2') format('woff2'),
             url('<?php echo $fonts_folder_url ?>glacialindifference.woff') format('woff'),
             url('<?php echo $fonts_folder_url ?>glacialindifference.ttf') format('truetype'),
             url('<?php echo $fonts_folder_url ?>glacialindifference.svg#glacial_indifferenceregular') format('svg');
        font-weight: normal;
        font-style: normal;
    
    }
    </style>
<?php
}
add_action( 'wp_head', 'imagineo_fonts');


if ( ! function_exists('workshop_post_type') ) {

    // Register Custom Post Type
    function workshop_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Workshop', 'Post Type General Name', 'imagineo' ),
            'singular_name'         => _x( 'Workshop', 'Post Type Singular Name', 'imagineo' ),
            'menu_name'             => __( 'Workshop', 'imagineo' ),
            'name_admin_bar'        => __( 'Workshop', 'imagineo' ),
            'archives'              => __( 'Workshop Archives', 'imagineo' ),
            'attributes'            => __( 'Workshop Attributes', 'imagineo' ),
            'parent_item_colon'     => __( 'Parent Workshop:', 'imagineo' ),
            'all_items'             => __( 'All workshops', 'imagineo' ),
            'add_new_item'          => __( 'Add New Workshop', 'imagineo' ),
            'add_new'               => __( 'Add Workshop', 'imagineo' ),
            'new_item'              => __( 'New Workshop', 'imagineo' ),
            'edit_item'             => __( 'Edit Workshop', 'imagineo' ),
            'update_item'           => __( 'Update Workshop', 'imagineo' ),
            'view_item'             => __( 'View Workshop', 'imagineo' ),
            'view_items'            => __( 'View Workshop', 'imagineo' ),
            'search_items'          => __( 'Search Workshop', 'imagineo' ),
            'not_found'             => __( 'Workshop Not found', 'imagineo' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'imagineo' ),
            'featured_image'        => __( 'Featured Image', 'imagineo' ),
            'set_featured_image'    => __( 'Set featured image', 'imagineo' ),
            'remove_featured_image' => __( 'Remove featured image', 'imagineo' ),
            'use_featured_image'    => __( 'Use as featured image', 'imagineo' ),
            'insert_into_item'      => __( 'Insert into Workshop', 'imagineo' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Workshop', 'imagineo' ),
            'items_list'            => __( 'Workshop list', 'imagineo' ),
            'items_list_navigation' => __( 'Workshop list navigation', 'imagineo' ),
            'filter_items_list'     => __( 'Filter Workshop list', 'imagineo' ),
        );
        $args = array(
            'label'                 => __( 'Workshop', 'imagineo' ),
            'description'           => __( 'Workshop', 'imagineo' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-welcome-learn-more',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'workshop', $args );
    
    }
    add_action( 'init', 'workshop_post_type', 0 );
    
}