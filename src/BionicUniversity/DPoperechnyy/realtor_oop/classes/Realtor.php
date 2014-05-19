<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */

include_once('Application/AbstractHousing.php');
include_once('Application/Apartment.php');
include_once('Application/House.php');
include_once('Application/Room.php');

use \Realtor\Application\AbstractHousing;

/**
 * Class Realtor
 */
class Realtor
{
    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param float $space
     */
    public function checkHouse($space)
    {
        foreach (AbstractHousing::$instances as $object) {
            if ($object instanceof AbstractHousing) {
                if ($object->getSquare() >= $space
                    && $object->getAvailability() == 1) {
                    $object->printOut();
                }
            }
        }
    }
}