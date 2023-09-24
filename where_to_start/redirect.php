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
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);
        $uri = $uri[0];

        header('Location: ' . $redirects[$uri]);
        exit;
    }
}

function should_redirect(string $path, array $redirects)
{
    $path = trim($path, '/');
    $path = explode('/', $path);
    $path = $path[0];

    return array_key_exists($path, $redirects);
}
