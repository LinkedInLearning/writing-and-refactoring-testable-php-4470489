<?php
declare(strict_types=1);

function maybe_redirect()
{
    $redirects_collection = new Redirect_Collection_Null();
    
    if ( ! filter_input(INPUT_GET, 'skip_redirects', FILTER_VALIDATE_BOOLEAN ) ) {
        $redirects_collection = new Redirect_Collection_From_Array([
            'linkedin' => 'https://www.linkedin.com',
            'learning' => 'https://www.linkedin.com/learning/',
        ]);
    }
    
    // Maybe redirect.
    $redirects = new Redirects( $redirects_collection );

    $top_level_path = get_top_level_path($_SERVER['REQUEST_URI']);

    if ($redirects->should_redirect($top_level_path)) {

        header('Location: ' . $redirects->get_redirect($top_level_path));
        exit;
    }
}

function get_top_level_path($uri_path): string
{
    $uri_path = trim($uri_path, '/');
    $uri_path = explode('/', $uri_path);
    return $uri_path[0];
}
