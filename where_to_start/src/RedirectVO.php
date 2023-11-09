<?php
declare(strict_types=1);


namespace Project\Redirect;

final class RedirectVO
{
    private string $from;
    private string $to;
    
    public function __construct(
        string $from,
        string $to,
    )
    {
        // If it's a valid URI, throw an exception
        if (filter_var($from, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("Invalid from URI, path expected: $from");
        }
        
        if ( empty($from) || empty($to) ) {
            throw new \InvalidArgumentException("Empty from or to URI");
        }
        
        $this->from = $from;
        $this->to = $to;
    }
    
    public function get_from(): string
    {
        return $this->from;
    }
    
    public function get_to(): string
    {
        return $this->to;
    }
    
    public function equals(RedirectVO $other): bool
    {
        return $this->from === $other->from && $this->to === $other->to;
    }

}
