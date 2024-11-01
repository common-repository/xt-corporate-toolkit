<?php
/**
 * Plugin Name: XT Corporate Toolkit
 * Description: Custom post type functionality
 * Version: 1.0.2
 * Author: Xylus Themes
 * Author URI: http://xylusinfo.com
 * Text Domain: xylus_themes
 * License: GPLv2 or later
 */

function xt_corporate_lite_custom_post_types(){
    $labels = array(
        'name'          => __('Clients','xylus_themes'),
        'singular_name' => __('Client','xylus_themes'),
        'add_new'       => __('Add Client','xylus_themes'),
        'add_new_item'  => __('Add Client','xylus_themes'),
        'edit_item'     => __('Edit Client','xylus_themes'),
        'menu_name'     => __('Clients','xylus_themes')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title')
    );
    register_post_type('clients', $args);


    $labels = array(
        'name'          => __('Team','xylus_themes'),
        'singular_name' => __('Team','xylus_themes'),
        'add_new'       => __('Add Team Member','xylus_themes'),
        'add_new_item'  => __('Add Team Member','xylus_themes'),
        'edit_item'     => __('Edit Team Member','xylus_themes'),
        'menu_name'     => __('Team','xylus_themes')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title')
    );
    register_post_type('team', $args);

    $labels = array(
        'name'          => __('Portfolio','xylus_themes'),
        'singular_name' => __('Portfolio','xylus_themes'),
        'add_new'       => __('Add Portfolio','xylus_themes'),
        'add_new_item'  => __('Add Portfolio','xylus_themes'),
        'edit_item'     => __('Edit Portfolio','xylus_themes'),
        'menu_name'     => __('Portfolio','xylus_themes')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_position'      => null,
        'taxonomies' => array('category'),
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title','editor','thumbnail')
    );
    register_post_type('portfolio', $args);

    $labels = array(
        'name'          => __('Services','xylus_themes'),
        'singular_name' => __('Service','xylus_themes'),
        'add_new'       => __('Add Service','xylus_themes'),
        'add_new_item'  => __('Add Service','xylus_themes'),
        'edit_item'     => __('Edit Service','xylus_themes'),
        'menu_name'     => __('Services','xylus_themes')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array( 'title')
    );
    register_post_type('services', $args);
}
add_action( 'init', 'xt_corporate_lite_custom_post_types');

function xt_corporate_lite_get_map($lat,$lng,$zoom){
    ?>
    <div id="map"></div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            google.maps.event.addDomListener(window, 'load', init);

            function init() {

                var lat = <?php echo $lat; ?>;
                var lng = <?php echo $lng; ?>;

                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)

                    zoom: <?php echo $zoom; ?>,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(lat, lng), // New York

                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{"visibility": "on"}]
                    }, {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [{"visibility": "on"}]
                    }, {
                        "featureType": "road.local",
                        "elementType": "labels.text",
                        "stylers": [{"visibility": "on"}]
                    }, {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [{"color": "#3f518c"}]
                    }, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}, {"color": "#84afa3"}, {"lightness": 52}]
                    }]
                };

                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: map,
                    title: '<?php echo bloginfo('site_title'); ?>'
                });
            }
        });

    </script>
<?php
}

function xt_corporate_lite_head_options(){
    global $xt_corporate_lite_opt;
    if(isset($xt_corporate_lite_opt['xt_favicon']['url']) && $xt_corporate_lite_opt['xt_favicon']['url'] != ''){
        echo '<link rel="shortcut icon" href="'.esc_url($xt_corporate_lite_opt['xt_favicon']['url']).'">';
    }
    ?>
    <style>
        <?php
        if(isset($xt_corporate_lite_opt['xt_homepage_header']['url']) && $xt_corporate_lite_opt['xt_homepage_header']['url'] !=''){
            ?>
        header {
            background-image: url("<?php echo esc_url($xt_corporate_lite_opt['xt_homepage_header']['url']); ?>");
        }
        <?php
    }
    if(is_page()){
        if(isset($xt_corporate_lite_opt['xt_page_header']['url']) && $xt_corporate_lite_opt['xt_page_header']['url'] != ''){
            ?>
        .page_header {
            background-image: url("<?php echo esc_url($xt_corporate_lite_opt['xt_page_header']['url']);?>");
        }
        <?php
        }
    }else{
        if(isset($xt_corporate_lite_opt['xt_blog_header']['url']) && $xt_corporate_lite_opt['xt_blog_header']['url'] != ''){
            ?>
        .page_header {
            background-image: url("<?php echo esc_url($xt_corporate_lite_opt['xt_blog_header']['url']);?>");
        }
        <?php
        }
    }

    if(isset($xt_corporate_lite_opt['xt_contact_background']['url']) && $xt_corporate_lite_opt['xt_contact_background']['url'] != ''){
        ?>
        section#contact {
            background-image: url(<?php echo esc_url($xt_corporate_lite_opt['xt_contact_background']['url']); ?>);
        }
        <?php
    }
    ?>
    </style>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri().'/assets/js/html5shiv.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri().'/assets/js/respond.js'; ?>"></script>
    <![endif]-->
<?php
}
add_action('wp_head','xt_corporate_lite_head_options');