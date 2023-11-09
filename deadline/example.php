<?php
declare(strict_types=1);

/**
 * This is a helper shim and should be refactored.
 *
 * @return string
 */
function link_url_from_link_array( $link, $identifier='linkId' ) {
    if ( array_key_exists( 'id', $link[$identifier] ) ) {
        // make sure id is a valid numeric only post. 
        if ( ! is_numeric( $link[$identifier]['id'] ) ) {
            $link_url = $link[$identifier]['url'];
            if ( ! filter_var( $link[$identifier]['url'], FILTER_VALIDATE_URL ) ) {
                $link_url = home_url( $link[$identifier]['url'] );
            }
            return $link_url;
        }

        // If there is an ID and it's an attachment we need to force using
        // the $link[$identifier]['url'] as the permalinks for pdf's don't exist.
        if ( 'attachment' === $link[$identifier]['type'] ) {
            $checker = $link[$identifier]['url'];

            // Add any additional file types to include
            $file_ext_to_use = [
                '.pdf'
            ];

            // check to see if any of the extensions are in the url.
            foreach ( $file_ext_to_use as $ext ) {
                // If the extension is found in the url.
                // set $link_url make sure it's a good link and return it.
                if ( strpos( $checker, $ext ) ) {
                    $link_url = $link[$identifier]['url'];

                    if ( ! filter_var( $link[$identifier]['url'], FILTER_VALIDATE_URL ) ) {
                        $link_url = home_url( $link[$identifier]['url'] );
                    }

                    return $link_url;
                }
            }
        }

        $link_url = ! empty( $link[$identifier]['id'] ) ? get_the_permalink($link[$identifier]['id']) : $link[$identifier]['url'];
        if ( ! filter_var( $link[$identifier]['url'], FILTER_VALIDATE_URL ) ) {
            $link_url = home_url( $link[$identifier]['url'] );
        }
    } else {
        $link_url = filter_var( $link[$identifier]['url'], FILTER_VALIDATE_URL ) ? $link[$identifier]['url'] : home_url( $link[$identifier]['url'] );
    }

    return $link_url;
}

