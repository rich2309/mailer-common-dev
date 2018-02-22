<?php
/**
 * Mailer File Doc Comment
 *
 * PHP version 7.2
 *
 * @category Mail
 * @package  Project\Mailer\Common\Entity
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @author   Guarssifi Younes <younes.gua@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
namespace Project\Mailer\Common\Entity;

/**
 * File Class Doc Comment
 *
 * @category Mail
 * @package  Project\Mailer\Common\Entity
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @author   García Ricardo <richgarcia459@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class Mail extends AbstractEntity
{
    protected $sender;
    protected $recipients;
    protected $subject;
    protected $message;
    protected $attachments;
    /**
     * Mail constructor
     *
     * @param array $data Array of data to hydrate the object
     */
    function __construct(array $data = [])
    {
        $this->hydrate($data);
    }
    /**
     * Get the mail sender
     *
     * @return null|String Mail sender
     */
    function getSender(): ?String
    {
        return $this->sender;
    }
    /**
     * Set mail's sender
     *
     * @param String $sender
     *
     * @return Mail
     */
    function setSender(String $sender): Mail
    {
        $this->sender = $sender;
        return $this;
    }
    /**
     * Get the mail recipients
     *
     * @return array|null
     */
    function getRecipients(): ?array
    {
        return $this->recipients;
    }
    /**
     * Set mail's recipients
     *
     * @param array $recipients
     *
     * @return Mail
     */
    function setRecipients(array $recipients): Mail
    {
        $this->recipients = $recipients;
        return $this;
    }
    /**
     * Get the mail subject
     *
     * @return null|String
     */
    function getSubject(): ?String
    {
        return $this->subject;
    }
    /**
     * Set mail's subject
     *
     * @param String $subject
     *
     * @return Mail
     */
    function setSubject(String $subject): Mail
    {
        $this->subject = $subject;
        return $this;
    }
    /**
     * Get the message of the mail
     *
     * @return null|String
     */
    function getMessage(): ?String
    {
        return $this->message;
    }
    /**
     * Set mail's message
     *
     * @param String $message
     *
     * @return Mail
     */
    function setMessage(String $message): Mail
    {
        $this->message = $message;
        return $this;
    }
    /**
     * Get the mail attachments
     *
     * @return array|null
     */
    function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Set mail's attachments
     *
     * @param array $attachments
     *
     * @return Mail
     */
    function setAttachments(array $attachments): Mail
    {
        $this->attachments = $attachments;
        return $this;
    }
    function __toString()
    {
        return $this->sender . "<br>" . $this->recipients . "<br>" .
            $this->subject . "<br>" . $this->message . "<br>" . $this->attachments;
    }
}