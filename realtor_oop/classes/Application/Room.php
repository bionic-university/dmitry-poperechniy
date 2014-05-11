<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:53 PM
 */

namespace Realtor\Application;

/**
 * Class Room
 * @package Realtor\Application
 */
class Room extends AbstractHousing implements ChargeableInterface
{
    /**
     * @var null
     */
    private $balcony;

    public function __construct(
        $address, $square, $availability = 1,
        $price, $balcony = null
    ) {
        parent::__construct($address, $square, $availability = 1, $price);
        $this->balcony = $balcony;
    }

    /**
     * @return null
     */
    public function getBalcony()
    {
        return $this->balcony;
    }

    /**
     * @param $balcony
     */
    public function setBalcony($balcony)
    {
        $this->balcony = $balcony;
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
        $base = "ROOM: " . "\n";
        $base .= "Address: {$this->address}" . "\n";
        $base .= "Area: {$this->square} meters" . "\n";
        $base .= "Price: {$this->price}" ."\n";
        $base .= "Balcony: {$this->balcony}" . "\n";

        return $base;
    }

}

$apt5 = new Room('Sunset bulv. 564, San Francisco', 40, 1, 499, 1);
$apt6 = new Room('Sherlock Holms str. 111, London, UK', 50.5, 1, 700, 0);