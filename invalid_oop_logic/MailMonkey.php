<?php
declare(strict_types=1);


namespace InvalidOOPLogic;

class MailMonkey implements MailerInterface
{

    function send(string $to, string $subject, string $body): bool
    {
        // TODO: Implement send() method.
    }

    function username(): MailerInterface
    {
        // TODO: Implement username() method.
    }

    function secret(): MailerInterface
    {
        // TODO: Implement secret() method.
    }
}
