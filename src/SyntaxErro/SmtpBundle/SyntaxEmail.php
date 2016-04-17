<?php

namespace SyntaxErro\SmtpBundle;


class SyntaxEmail
{
    /**
     * @var null|string
     */
    private $as;

    /**
     * @var string
     */
    private $to;

    /**
     * @var null|string
     */
    private $replyTo;

    /**
     * @var null|string
     */
    private $subject;

    /**
     * @var string
     */
    private $content;

    /**
     * @var null|string
     */
    private $contentType;

    /**
     * SyntaxEmail constructor.
     * @param string $to    Recipient of message.
     * @param string $content   Content of message.
     */
    public function __construct($to, $content)
    {
        $this->to = $to;
        $this->content = $content;
    }

    /**
     * @return null|string
     */
    public function getAs()
    {
        return $this->as;
    }

    /**
     * @param null|string $as
     * @return SyntaxEmail
     */
    public function setAs($as)
    {
        $this->as = $as;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return SyntaxEmail
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param null|string $replyTo
     * @return SyntaxEmail
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param null|string $subject
     * @return SyntaxEmail
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return SyntaxEmail
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param null|string $contentType
     * @return SyntaxEmail
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }
}
