<?php
declare(strict_types=1);


namespace InvalidOOPLogic;

interface MailerInterface
{

    function send(string $to, string $subject, string $body): bool;
    
    function username( string $username ): self;
    
    function secret( string $secret ): self;
    
}
