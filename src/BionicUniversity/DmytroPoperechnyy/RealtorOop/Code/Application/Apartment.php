<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:52 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application;

/**
 * Class Apartment than extends AbstractHousing
 *
 * Class Apartment
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application
 */
class Apartment extends AbstractHousing
{
    /**
     * @var int
     */
    private $rooms;

    /**
     * @param string $address
     * @param float $square
     * @param int $availability
     * @param float $price
     * @param int $rooms
     * @param string $contact
     */
    public function __construct($address, $square, $availability = 1, $price, $rooms, $contact)
    {
        parent::__construct($address, $square, $availability, $price, $contact);
        $this->rooms = $rooms;
    }

    /**
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    protected function getDescription()
    {
        $base = "APARTMENT: " . "\n";
        $base .= parent::getDescription();
        $base .= "Number of rooms: $this->rooms" . "\n";

        return $base;
    }

    /**
     * @return bool
     */
    public function verifyData()
    {
        return $this->square > 20 && $this->square < 1000;        
    }
}

