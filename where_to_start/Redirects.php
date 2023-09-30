<?php
declare(strict_types=1);


class Redirects
{
    
    public function __construct(
        private array $redirects = [],
    ) {
    }
    public function to_array(): array {
        return $this->redirects;
    }
}
