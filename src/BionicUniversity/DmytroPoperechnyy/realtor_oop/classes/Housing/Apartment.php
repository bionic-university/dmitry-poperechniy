<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:52 PM
 */

namespace Realtor\Housing;

/**
 * Class Apartment
 * @package Realtor\Housing
 */
class Apartment extends AbstractHousing
{
    /**
     * @var int
     */
    private $rooms;

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
     * @param $rooms
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

