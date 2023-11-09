<?php
declare(strict_types=1);

namespace Project\Redirect\Collections;

use Project\Redirect\RedirectVO;

class Nullable implements Collection_Interface
{

    public function to_array(): array
    {
        return [];
    }

    public function get_redirect($uri): RedirectVO
    {
        return new RedirectVO($uri, $uri);
    }
}
