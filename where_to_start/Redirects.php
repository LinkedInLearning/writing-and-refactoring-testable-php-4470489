<?php
declare(strict_types=1);


class Redirects
{

    public function __construct(
        private Redirect_Collection_Interface $redirects,
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
        return $this->redirects->get_redirect($uri);
    }
}
