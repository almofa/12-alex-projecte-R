<?php


namespace App\Utils;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MyMail
{
    private Swift_Mailer $mailer;
    private string $email;
    private string $name;

    /**
     * MyMail constructor.
     * @param string $smtpServer
     * @param int $smtpPort
     * @param string $smtpSecurity
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $name
     */
    private function __construct(string $smtpServer, int $smtpPort, string $smtpSecurity, string $username,
                                string $password, string $email, string $name)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport($smtpServer, $smtpPort, $smtpSecurity))
            ->setUsername($username)
            ->setPassword($password)
        ;

        // Create the Mailer using your created Transport
        $this->mailer = new Swift_Mailer($transport);
        $this->email = $email;
        $this->name = $name;

    }

    /**
     * @param string $asunto
     * @param string $mailTo
     * @param string $nameTo
     * @param string $text
     */

    public function send(string $asunto, string $mailTo, string $nameTo, string $text) {
        // Create a message
        $message = (new Swift_Message($asunto, $text))
            ->setFrom([$this->email=>$this->name])
            ->setTo([$mailTo => $nameTo]);

        // Send the message
        $this->mailer->send($message);
    }

    /**
     * @param array $config
     * @return MyMail
     */
    public static function load(array $config): MyMail
    {
        return new MyMail($config['smtp_server'], $config['smtp_port'], $config['smtp_security'],
            $config['username'], $config['password'], $config['email'],$config['name'] );
    }
}