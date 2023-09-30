<?php
declare(strict_types=1);

function maybe_redirect()
{
    // Maybe redirect.
    $redirects = new Redirects([
        'linkedin' => 'https://www.linkedin.com',
        'learning' => 'https://www.linkedin.com/learning/',
    ] );
    
    $top_level_path = get_top_level_path( $_SERVER['REQUEST_URI'] );

    if ($redirects->should_redirect( $top_level_path ) ) {

        header('Location: ' . $redirects->get_redirect( $top_level_path ));
        exit;
    }
}

function get_top_level_path( $uri_path ) :string 
{
    $uri_path = trim($uri_path, '/');
    $uri_path = explode('/', $uri_path);
    return $uri_path[0];
}
