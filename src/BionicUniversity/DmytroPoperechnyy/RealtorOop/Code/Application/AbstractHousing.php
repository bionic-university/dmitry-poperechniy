<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */
namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application;

/**
 * AbstractHousing Class with main methods
 *
 * Class AbstractHousing
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application
 */
abstract class AbstractHousing
{
    use ContactableTrait;
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

    /**
     * @param $address
     * @param $square
     * @param $price
     * @param $contact
     * @param int $availability
     */
    public function __construct($address, $square, $price, $contact, $availability = 1)
    {
        $this->address = $address;
        $this->square = $square;
        $this->price = $price;
        $this->contact = $contact;
        $this->availability = $availability;
    }

    /**
     * @return mixed
     */
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

    /**
     * @return string
     */
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