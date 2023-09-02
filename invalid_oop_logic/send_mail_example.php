<?php
declare(strict_types=1);

namespace InvalidOOPLogic;
function send_mail(MailerInterface $mailer)
{
    $mailer->username(env('MAIL_USERNAME'))
        ->secret(env('MAIL_SECRET'))
        ->send('to', 'subject', 'body');
}
