<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:53 PM
 */

namespace Realtor\Housing;

/**
 * Class Room
 * @package Realtor\Housing
 */
class Room extends AbstractHousing
{
    /**
     * @var null
     */
    private $balcony;

    public function __construct(
        $address, $square, $availability = 1,
        $price, $balcony = null, $contact
    ) {
        parent::__construct($address, $square, $availability, $price, $contact);
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
    protected function getDescription()
    {
        $base = "ROOM: " . "\n";
        $base .= parent::getDescription();
        $base .= "Balcony: $this->balcony" . "\n";

        return $base;
    }

    /**
     * @return bool
     */
    public function verifyData()
    {
        return $this->square > 5;        
    }

}

