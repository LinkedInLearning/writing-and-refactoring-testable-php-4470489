<?php
declare(strict_types=1);

function maybe_redirect()
{
    // Maybe redirect.
    $redirects = [
        'linkedin' => 'https://www.linkedin.com',
        'learning' => 'https://www.linkedin.com/learning/',
    ];

    if (should_redirect($_SERVER['REQUEST_URI'], $redirects)) {
        $uri = get_top_level_path($_SERVER['REQUEST_URI'] );

        header('Location: ' . $redirects[$uri]);
        exit;
    }
}

function should_redirect(string $path, array $redirects)
{
    return array_key_exists(get_top_level_path( $path ), $redirects);
}

function get_top_level_path( $uri_path ) :string 
{
    $uri_path = trim($uri_path, '/');
    $uri_path = explode('/', $uri_path);
    return $uri_path[0];
}
