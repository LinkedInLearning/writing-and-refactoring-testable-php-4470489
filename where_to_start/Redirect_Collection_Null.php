<?php
declare(strict_types=1);


class Redirect_Collection_Null implements Redirect_Collection_Interface
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
