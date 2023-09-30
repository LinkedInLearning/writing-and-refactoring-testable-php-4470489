<?php
declare(strict_types=1);


class Redirect_Collection_From_Array implements Redirect_Collection_Interface
{

    public function __construct(
        private array $redirects,
    )
    {
    }
    public function to_array(): array
    {
        return $this->redirects;
    }

    public function get_redirect($uri): string
    {
        return $this->redirects[$uri];
    }
}
