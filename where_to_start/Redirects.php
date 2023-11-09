<?php
declare(strict_types=1);

use Project\Redirect\Collections\Collection_Interface;

class Redirects
{

    public function __construct(
        private Collection_Interface $redirects,
    )
    {
    }

    public function to_array(): array
    {
        return $this->redirects->to_array();
    }

    public function should_redirect($uri): bool
    {
        return array_key_exists($uri, $this->redirects->to_array());
    }

    public function get_redirect($uri): string
    {
        return $this->redirects->get_redirect( $uri )->get_to();
    }
}
