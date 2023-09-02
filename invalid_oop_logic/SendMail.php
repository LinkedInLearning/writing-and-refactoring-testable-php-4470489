<?php
declare(strict_types=1);


namespace InvalidOOPLogic;

class SendMail implements MailerInterface
{

    private string $username = '';
    private string $secret;

    function send(string $to, string $subject, string $body): bool
    {
        // instantiaite SendMail object and send mail
    }

    function username( string $username ): MailerInterface
    {
        // get the username
        
        return $this;
    }

    function secret( string $secret ): MailerInterface
    {
        // get the secret
        $this->secret = $secret;

        return $this;
    }
}
