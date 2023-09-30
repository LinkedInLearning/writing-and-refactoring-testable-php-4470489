<?php
declare(strict_types=1);


interface Redirect_Collection_Interface
{
    public function to_array(): array;
    
    public function get_redirect($uri): RedirectVO;
}
