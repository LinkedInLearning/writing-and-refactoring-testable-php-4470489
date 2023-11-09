<?php
declare(strict_types=1);

namespace Project\Redirect\Collections;

use \Project\Redirect\RedirectVO;

class From_Array implements Collection_Interface
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

    public function get_redirect($uri): RedirectVO
    {
        return new RedirectVO($uri, $this->redirects[$uri] );
    }
}
