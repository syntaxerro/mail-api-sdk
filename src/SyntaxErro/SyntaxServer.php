<?php

namespace SyntaxErro;

use SyntaxErro\SmtpBundle\SyntaxEmail;
use SyntaxErro\SmtpBundle\SmtpException;

class SyntaxServer
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $url = 'https://syntax-shell.me/smtp-api';

    /**
     * SyntaxServer constructor.
     * @param string $username  Full email address.
     * @param string $password  Password.
     */
    public function __construct($username, $password)
    {
        $this->username = base64_encode($username);
        $this->password = base64_encode($password);
    }

    /**
     * @param SyntaxEmail $email
     * @return SyntaxServer
     * @throws SmtpException
     */
    public function send(SyntaxEmail $email)
    {
        if(!$email->getTo() || !count($email->getTo())) throw new SmtpException("Cannot send email with empty recipients.");
        foreach($email->getTo() as $to) {
            $post = [
                'username' => $this->username,
                'password' => $this->password,
                'to' => $to,
                'body' => $email->getContent()
            ];

            if($email->getAs() !== null) $post['as'] = $email->getAs();
            if($email->getContentType() !== null) $post['content_type'] = $email->getContentType();
            if($email->getReplyTo() !== null) $post['reply_to'] = $email->getReplyTo();
            if($email->getSubject() !== null) $post['subject'] = $email->getSubject();

            $opts['http'] = [
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n".
                    "User-Agent: Syntax SMTP PHP SDK",
                'content' => http_build_query($post),
                'ignore_errors' => true
            ];
            $context  = stream_context_create($opts);
            $result = json_decode(file_get_contents($this->url, false, $context), JSON_OBJECT_AS_ARRAY);
            if($result['status'] !== 200) throw new SmtpException($result['message']);
        }
        return $this;
    }

    /**
     * Return URL requested for sending emails.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set URL requested for sending emails.
     *
     * @param string $url
     * @return SyntaxServer
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
