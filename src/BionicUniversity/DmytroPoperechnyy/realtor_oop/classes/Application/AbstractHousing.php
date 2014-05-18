<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */

namespace Realtor\Application;

/**
 * Class AbstractHousing
 * @package Realtor\Application
 */
abstract class AbstractHousing
{
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
     * @var array
     */
    static $instances = [];

    public function __construct($address, $square, $availability = 1, $price)
    {
        $this->address = $address;
        $this->square = $square;
        $this->availability = $availability;
        $this->price = $price;
        self::$instances[] = $this;
    }

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
        print $this->getValue();
    }

    abstract protected function getValue();
}