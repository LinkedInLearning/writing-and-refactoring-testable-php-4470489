<?php
declare(strict_types=1);

namespace Project\Redirect\Collections;

use Project\Redirect\RedirectVO;

interface Collection_Interface
{
    public function to_array(): array;
    
    public function get_redirect($uri): RedirectVO;
}
