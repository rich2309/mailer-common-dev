<?php
/**
 * FileTransformer File Doc Comment
 *
 * PHP version 7.2
 *
 * @category MailTransformer
 * @package  Project\Mailer\Common\Transformer
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @author   García Ricardo <richgarcia459@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
namespace Project\Mailer\Common\Transformer;
/**
 * MailTransformer Class Doc Comment
 *
 * @category MailTransformer
 * @package  Project\Mailer\Common\Transformer
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @author   García Ricardo <richgarcia459@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
use Project\Mailer\Common\Entity\Mail;

class MailTransformer
{
    protected static $instance = null;
    /**
     * Get MailTransformer instance
     *
     * @return null|MailTransformer return MailTransformer instance
     * else return new instance
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new MailTransformer();
        }
        return self::$instance;
    }
    /**
     * MailTransformer constructor.
     */
    protected function __construct()
    {
    }
    /**
     * Transform function
     *
     * @param Mail $mail mail to transform to array
     *
     * @return array
     */
    public function transform(Mail $mail): array
    {
        return array(
            "sender"       => $mail->getSender(),
            "recipients"   => $mail->getRecipients(),
            "subject"      => $mail->getSubject(),
            "message"      => $mail->getMessage(),
            "attachments"  => $mail->getAttachments()
        );
    }
}