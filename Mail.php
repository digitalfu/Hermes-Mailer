<?php

namespace Hermes\Mailer;

use RuntimeException;
use InvalidArgumentException;

/**
 * Hermes Mailer Class
 *
 * @package   Hermes\Mailer
 * @version   v0.1.0
 * @author    https://twitter.com/digitalfu
 * @copyright (c) 2015 Hamish Coates
 * @license   MIT
 */
class Mail
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $senderName;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $attachments = [];

    /**
     * @var string
     */
    private $replyTo;

    /**
     * @const
     */
    const EMAIL_TYPE_TEXT = 'text';

    /**
     * @const
     */
    const EMAIL_TYPE_HTML = 'html';

    /**
     * @var array Valid email types
     */
    public static $emailTypes = [
        self::EMAIL_TYPE_TEXT,
        self::EMAIL_TYPE_HTML
    ];

    /**
     * Constructor
     */
    public function __constructor() {
        $this->id = md5(uniqid(time()));
    }

    /**
     * Set the email type
     *
     * @param $type
     * @return $this
     */
    function setType($type)
    {
        if(!in_array($type, self::$emailTypes)) {
            throw new InvalidArgumentException(sprintf('The given type \'%s\' is not not a valid email type', $type));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get the email type
     *
     * @return string
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * Get the recipients email address
     *
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set the recipients email address
     *
     * @param string $recipient
     * @return Mail
     */
    public function setRecipient($recipient)
    {
        if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('The given email \'%s\' is not a valid recipient address', $recipient));
        }

        $this->recipient = $recipient;
        return $this;
    }

    /**
     * Get the senders email address
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the senders email address
     *
     * @param string $sender
     * @return Mail
     */
    public function setSender($sender)
    {
        if (filter_var($sender, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('The given email \'%s\' is not a valid sender address', $sender));
        }

        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the sender name
     *
     * @return string
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * Set the senders name
     *
     * @param string $senderName
     * @return Mail
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;

        return $this;
    }

    /**
     * Get the reply to email address
     *
     * @return string
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * Set the reply to email address
     *
     * @param string $replyTo
     * @return Mail
     */
    public function setReplyTo($replyTo)
    {
        if (filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('The given email \'%s\' is not a valid reply to address', $replyTo));
        }

        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * Get the subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the subject with the given string
     *
     * @param string $subject
     * @return Mail
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the message with the given string
     *
     * @param string $message
     * @return Mail
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get attachments
     *
     * @return array
     */
    public function getAttachments() {

        return $this->attachments;
    }

    /**
     * Add an attachment
     *
     * @param $attachment
     * @return self
     */
    public function addAttachment($attachment)
    {
        if(is_array($attachment)) {
            throw new RuntimeException('addAttachment cannot parse an array of attachments');
        }

        $this->attachments [] = $attachment;

        return $this;
    }

    /**
     * Set attachments to the given array of attachments
     *
     * @param array $attachments
     * @return Mail
     */
    public function setAttachments(array $attachments)
    {
        $this->attachments = $attachments;

        return $this;
    }
}
