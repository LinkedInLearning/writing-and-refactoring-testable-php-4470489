<?php
declare(strict_types=1);

namespace utilities;

function check_admin_screen($key = '')
{

    // If we aren't on the admin, or don't have the function, fail right away.
    if (!is_admin() || !function_exists('get_current_screen')) {
        return false;
    }

    // Get the screen object.
    $screen = get_current_screen();

    // If we didn't get our screen object, bail.
    if (!is_object($screen)) {
        return false;
    }

    // Switch through and return the item.
    switch (sanitize_key($key)) {

        case 'object' :
            return $screen;
            break;

        case 'action' :
            return $screen->action;
            break;

        case 'base' :
            return $screen->base;
            break;

        case 'id' :
            return $screen->id;
            break;

        case 'post_type' :
            return $screen->post_type;
            break;

        default :
            return [
                'action' => $screen->action,
                'base' => $screen->base,
                'id' => $screen->id,
                'post_type' => $screen->post_type,
            ];

        // End all case breaks.
    }
}

function get_data_by_title($post_title = '', $post_type = 'post')
{

    // Bail without a title.
    if (empty($post_title)) {
        return false;
    }

    // Call the global DB.
    global $wpdb;

    // Set our table name.
    // $table_name = $wpdb->posts;

    // Set up our query.
    $query_args = $wpdb->prepare("
		SELECT   ID, post_title
		FROM     $wpdb->posts
		WHERE    post_title = '%s'
		AND      post_status = '%s'
	", esc_attr($post_title), esc_attr('publish'));

    // Process the query.
    // phpcs:ignore -- this query is needed for specificity.
    $query_run = $wpdb->get_results($query_args, ARRAY_A);

    // Bail without any data.
    if (empty($query_run) || empty($query_run[0])) {
        return false;
    }

    // Set my two values.
    return [
        'ID' => $query_run[0]['ID'],
        'title' => $query_run[0]['post_title'],
    ];
}

function get_data_by_id($post_id = 0)
{

    // Bail without an ID.
    if (empty($post_id)) {
        return false;
    }

    // Set my two values.
    return [
        'ID' => $post_id,
        'title' => get_the_title($post_id),
    ];
}

function parse_referrer_data($parse_part = '')
{

    // First get the referrer string.
    $get_referer_string = wp_get_referer();

    // Bail without the string to work with.
    if (empty($get_referer_string)) {
        return false;
    }

    // Now get the data parts.
    $get_referrer_data = wp_parse_url($get_referer_string);

    // Bail without that data.
    if (empty($get_referrer_data)) {
        return false;
    }

    // Return the whole thing if requested.
    if (empty($parse_part)) {
        return $get_referrer_data;
    }

    // Return the piece requested, or nothing.
    return !isset($get_referrer_data[$parse_part]) ? false : $get_referrer_data[$parse_part];
}

function get_global_nav_page_form_url($custom_args = [])
{

    // Bail if we aren't on the admin side.
    if (!is_admin()) {
        return false;
    }

    // Set my slug.
    $set_menu_slug = trim(Core\NAV_MENU_SLUG);

    // Set up my args.
    $set_basic_args = ['page' => $set_menu_slug];

    // Check for the custom ones.
    $set_query_args = !empty($custom_args) ? wp_parse_args($custom_args, $set_basic_args) : $set_basic_args;

    // Return the constructed URL.
    return add_query_arg($set_query_args, admin_url('themes.php'));
}
