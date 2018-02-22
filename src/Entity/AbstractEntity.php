<?php

/**
 * AbstractEntity File Doc Comment
 *
 * PHP version 7.2
 *
 * @category AbstractEntity
 * @package  Project\Mailer\Common\Entity
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
namespace Project\Mailer\Common\Entity;
/**
 * AbstractEntity Class Doc Comment
 *
 * @category AbstractEntity
 * @package  Project\Mailer\Common\Entity
 * @author   Skora Vincent <vincent.skora9@etu.univ-lorraine.fr>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
abstract class AbstractEntity
{
    /**
     * Hydrate function
     *
     * @param array $data Array of data to hydrate object
     *
     * @return void
     */
    protected function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $keyname = "";
            foreach (explode('-', $key) as $keyValue) {
                $keyname .= ucfirst($keyValue);
            }
            $setter = 'set'.$keyname;
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}