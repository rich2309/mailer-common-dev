<?php
/**
 * MailValidator File Doc Comment
 *
 * PHP version 7.2
 *
 * @category MailValidator
 * @package  Project\Mailer\Common\Validator
 * @author   García Ricardo <richgarcia459@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
namespace Project\Mailer\Common\Validator;
/**
 * MailValidator Class Doc Comment
 *
 * @category MailValidator
 * @package  Project\Mailer\Common\Validator
 * @author   García Ricardo <richgarcia459@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
use Project\Mailer\Common\Entity\Mail;
class MailValidator
{
    protected static $instance = null;
    protected $errors;
    protected $validation_patters;
    /**
     * Get MailValidator instance
     *
     * @return null|MailValidator return MailValidator instance
     * else return new instance
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new MailValidator();
        }
        return self::$instance;
    }
    /**
     * MailValidator constructor
     */
    protected function __construct()
    {
        $this->errors = array();
        $this->validation_patters = array(
            "email_pattern" => "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/"
        );
    }
    /**
     * Validate a mail
     *
     * @param Mail $mail test each field from the object mail
     *
     * @return true if the mail is valid, false otherwise
     */
    public function validate(Mail $mail)
    {
        if (is_null($mail->getSender()) || !preg_match($this->validation_patters['email_pattern'],$mail->getSender()))
            $this->errors['sender'] = 'sender error';

        if (!is_null($mail->getRecipients()))
        {
            foreach ($mail->getRecipients() as $recipient)
            {
                if (!preg_match($this->validation_patters['email_pattern'],$recipient))
                    $this->errors['recipients'] = 'recipient error at: ' . $recipient;
            }
        }
        else
            $this->errors['recipients'] = 'recipient can not be empty';

        if (is_null($mail->getSubject()) || strlen(trim($mail->getSubject())) < 1)
            $this->errors['subject'] = 'subject can not be empty';

        if (is_null($mail->getMessage()) || strlen(trim($mail->getMessage())) < 1)
            $this->errors['message'] = 'message can not be empty';

        return empty($this->errors);
    }
    /**
     * Get errors from validation
     *
     * @return null|array return validation errors
     */
    public function getValidationErrors(): ?array
    {
        /*return implode("\\n", $this->error);*/
        return $this->errors;
    }
}