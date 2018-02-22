<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 22/02/2018
 * Time: 12:26 AM
 */

use PHPUnit\Framework\TestCase;
use Project\Mailer\Common\Entity\Mail;

class AbstractEntityTest extends TestCase
{
    function testHydrateMail()
    {
        $mail_recipients_expected = array(
            'recipient_example_one@mail.com',
            'recipient_example_2@mail.com',
            'recipient_example_3@mail.com'
        );
        $mail_message_expected = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit';

        $mail_data = array(
            'sender'     => 'sender@mail.com',
            'recipients' => array(
                'recipient_example_one@mail.com',
                'recipient_example_2@mail.com',
                'recipient_example_3@mail.com'
            ),
            'message'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit'
        );

        $mail_filled = new Mail($mail_data);

        $this->assertEquals('sender@mail.com',$mail_filled->getSender());
        $this->assertEquals($mail_recipients_expected,$mail_filled->getRecipients());
        $this->assertEquals($mail_message_expected,$mail_filled->getMessage());

    }
}