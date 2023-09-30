<?php
declare(strict_types=1);


class Redirects
{

    public function __construct(
        private array $redirects = [],
    )
    {
    }

    public function to_array(): array
    {
        return $this->redirects;
    }

    public function should_redirect($uri): bool
    {
        return array_key_exists($uri, $this->redirects);
    }
    
    public function get_redirect( $uri ) :string
    {
        return $this->redirects[$uri];
    }
}
