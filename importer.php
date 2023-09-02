<?php
declare(strict_types=1);

function import( $post ) {
    // Get the imported post type
    $post_type = get_mirrored_post_type_slug( $post['type'] );

    // If that is not registered, get out of here
    if ( ! in_array( $post_type, get_post_types(), true ) ) {
        error(
            'Invalid post type - ' . $post_type,
            log_context_builder( [ 'post_type' => $post_type ] ),
            LOG_SOURCE
        );

        return;
    }

    // Get the external ID
    $external_id = $post['id'];

    // See if we have already dealt with this
    $post_id = post_id_if_exists( $post );
    $exists  = (bool) $post_id;

    // Skip it if we have already imported it, and it hasn't updated
    if (
        $post_id
        && (int) get_post_meta( $post_id, 'source_modified_time', true ) === strtotime( $post['modified'] )
    ) {
        do_action( 'importer_post_already_imported', $post_id, $post );

        info(
            'Post exists and is up to date - ' . $post_id,
            log_context_builder( [ 'post_id' => $post_id ] ),
            LOG_SOURCE
        );

        return;
    }

    // build the insert array
    $insert_post = [
        'ID'                => $post_id,
        'post_type'         => $post_type,
        'post_title'        => $post['title']['rendered'],
        'post_status'       => 'publish',
        'post_content'      => $post['content']['rendered'],
        'post_name'         => $post_type . '-' . $external_id,
        'excerpt'           => $post['excerpt']['rendered'],
        'meta_input'        => create_metadata( $post ),
        'post_date'         => $post['date'],
        'post_date_gmt'     => $post['date_gmt'],
        'post_modified'     => $post['modified'],
        'post_modified_gmt' => $post['modified_gmt'],
    ];

    // Allow plugins to modify the post before inserting.
    $insert_post = apply_filters( 'importer_insert_post', $insert_post, $post );

    if ( ! apply_filters( 'importer_should_import_post', true, $post ) ) {
        return;
    }

    // insert
    $post_id = wp_insert_post( $insert_post );

    $message = $exists
        ? 'Post updated - ' . $post_id
        : 'Post created - ' . $post_id;

    info(
        $message,
        log_context_builder( [ 'post_id' => $post_id, 'post' => $insert_post ] ),
        LOG_SOURCE
    );

    // attach terms
    if ( ! empty( $post['categories'] ) ) {
        wp_set_object_terms( $post_id, map_categories( $post ), 'category' );
    }

    do_action( 'importer_post_imported', $post_id, $post );
}
