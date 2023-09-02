<?php
declare(strict_types=1);


namespace InvalidOOPLogic;

class MailMonkey implements MailerInterface
{
    
    private string $username;
    private string $secret;

    function send(string $to, string $subject, string $body): bool
    {
        // instantiaite MailMonkey object and send mail user username and secret
    }

    function username( string $username ): MailerInterface
    {
        // get the username
        $this->username = $username;

        return $this;
    }

    function secret( string $secret ): MailerInterface
    {
        // get the secret
        $this->secret = $secret;

        return $this;
    }
}
