<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:52 PM
 */

namespace Realtor\Application;

include_once('ChargeableInterface.php');

/**
 * Class Apartment
 * @package Realtor\Application
 */
class Apartment extends AbstractHousing implements ChargeableInterface
{
    /**
     * @var int
     */
    private $rooms;

    public function __construct($address, $square, $availability = 1, $price, $rooms)
    {
        parent::__construct($address, $square, $availability = 1, $price);
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
    protected function getValue()
    {
        $base = "APARTMENT: " . "\n";
        $base .= "Address: {$this->address}" . "\n";
        $base .= "Area: {$this->square} meters" . "\n";
        $base .= "Price: {$this->price}" ."\n";
        $base .= "Number of rooms: {$this->rooms}" . "\n";

        return $base;
    }
}

$apt1 = new Apartment('West str.123, New York, USA', 50.5, 1, 1000, 2);
$apt2 = new Apartment('East str.987, California, USA', 77.5, 1, 900, 3);