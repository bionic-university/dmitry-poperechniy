<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */
namespace Realtor\Housing;

include_once('../General/TraitContactable.php');

use \Realtor\General\TraitContactable;

/**
 * Class AbstractHousing
 * @package Realtor\Housing
 */
abstract class AbstractHousing
{
    use TraitContactable;
    /**
     * @var string
     */
    protected $address;

    /**
     * @var float
     */
    protected $square;

    /**
     * @var int
     */
    protected $availability;

    /**
     * @var int
     */
    protected $price;

    public function __construct($address, $square, $availability = 1, $price, $contact)
    {
        $this->address = $address;
        $this->square = $square;
        $this->availability = $availability;
        $this->price = $price;
        $this->contact = $contact;
    }
    
    abstract public function verifyData();

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return float
     */
    public function getSquare()
    {
        return $this->square;
    }

    /**
     * @param $square
     */
    public function setSquare($square)
    {
        $this->square = $square;
    }

    /**
     * @return int
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param $available
     */
    public function setAvailability($available)
    {
        $this->availability = $available;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function printOut()
    {
        print $this->getDescription();
    }

    /**
     * Returns housing description
     *
     * @return string
     */
    protected function getDescription()
    {
        $base = "Address: $this->address" . "\n";
        $base .= "Area: $this->square meters" . "\n";
        $base .= "Price: $this->price" ."\n";
        
        return $base;
    }   
}