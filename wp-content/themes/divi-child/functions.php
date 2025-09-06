<?php

function divi_child_enqueue_styles() {
    wp_enqueue_style('divi-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('divi-child-style', get_stylesheet_directory_uri() . '/style.css', array('divi-parent-style'));
}

add_action('wp_enqueue_scripts', 'divi_child_enqueue_styles');

function divi_child_register_event_post_type() {
    $labels = array(
        'name' => 'Événements',
        'singular_name' => 'Événement',
        'menu_name' => 'Événements',
        'add_new' => 'Ajouter un événement',
        'add_new_item' => 'Ajouter un nouvel événement',
        'edit_item' => 'Modifier l\'événement',
        'new_item' => 'Nouvel événement',
        'view_item' => 'Voir l\'événement',
        'search_items' => 'Rechercher des événements',
        'not_found' => 'Aucun événement trouvé',
        'not_found_in_trash' => 'Aucun événement dans la corbeille',
        'all_items' => 'Tous les événements'
    );
    
    $args = array(
        'public' => true,
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-calendar-alt',
        'has_archive' => true,
        'rewrite' => array('slug' => 'evenements')
    );
    register_post_type('evenement', $args);
}

function divi_child_add_event_date_meta_box() {
    add_meta_box(
        'event_date_meta_box',
        'Date de l\'événement',
        'divi_child_event_date_meta_box_callback',
        'evenement',
        'side',
        'high'
    );
}

function divi_child_event_date_meta_box_callback($post) {
    wp_nonce_field('divi_child_event_date_nonce', 'divi_child_event_date_nonce');
    $event_date = get_post_meta($post->ID, '_event_date', true);
    echo '<label for="event_date">Date de l\'événement :</label>';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" style="width: 100%; margin-top: 5px;" />';
}

function divi_child_save_event_date_meta_box($post_id) {
    if (!isset($_POST['divi_child_event_date_nonce']) || !wp_verify_nonce($_POST['divi_child_event_date_nonce'], 'divi_child_event_date_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }
}

add_action('init', 'divi_child_register_event_post_type');
add_action('add_meta_boxes', 'divi_child_add_event_date_meta_box');
add_action('save_post', 'divi_child_save_event_date_meta_box');

function divi_child_get_events($limit = 5) {
    $args = array(
        'post_type' => 'evenement',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return get_posts($args);
}

function divi_child_display_events($limit = 5) {
    $events = divi_child_get_events($limit);
    
    if (empty($events)) {
        echo '<p>Aucun événement à afficher pour le moment.</p>';
        return;
    }
    
    echo '<div class="event-section">';
    echo '<h2>Nos Événements</h2>';
    
    foreach ($events as $event) {
        setup_postdata($event);
        $event_date = get_post_meta($event->ID, '_event_date', true);
        $display_date = $event_date ? date('d/m/Y', strtotime($event_date)) : get_the_date('d/m/Y', $event->ID);
        
        echo '<div class="event-item">';
        echo '<h3 class="event-title">' . get_the_title($event->ID) . '</h3>';
        echo '<div class="event-date">' . $display_date . '</div>';
        echo '<div class="event-content">' . get_the_content(null, false, $event->ID) . '</div>';
        echo '</div>';
    }
    
    wp_reset_postdata();
    echo '</div>';
}

?>
