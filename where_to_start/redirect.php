<?php
declare(strict_types=1);

function maybe_redirect()
{
// Maybe redirect.
    $redirects = [
        'linkedin' => 'https://www.linkedin.com',
        'learning' => 'https://www.linkedin.com/learning/',
    ];

// Check the REQUEST_URI to see if it matches a redirect.
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/');
    $uri = explode('/', $uri);
    $uri = $uri[0];

    if (array_key_exists($uri, $redirects)) {
        header('Location: ' . $redirects[$uri]);
        exit;
    }
}
