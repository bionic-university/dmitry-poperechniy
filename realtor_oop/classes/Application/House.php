<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:52 PM
 */

namespace Realtor\Application;

/**
 * Class House
 * @package Realtor\Application
 */
class House extends AbstractHousing implements ChargeableInterface
{
    /**
     * @var float|null
     */
    private $territory;

    /**
     * @var null
     */
    private $garage;

    public function __construct(
        $address, $square, $availability = 1,
        $price, $territory, $garage = null
    ) {
        parent::__construct($address, $square, $availability = 1, $price);
        $this->territory = $territory;
        $this->garage = $garage;
    }

    /**
     * @return float|null
     */
    public function getTerritory()
    {
        return $this->territory;
    }

    /**
     * @param $territory
     */
    public function setTerritory($territory)
    {
        $this->territory = $territory;
    }

    /**
     * @return null
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * @param $garage
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;
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
        $base = "HOUSE: " . "\n";
        $base .= "Address: {$this->address}" . "\n";
        $base .= "Area: {$this->square} meters" . "\n";
        $base .= "Price: {$this->price}" ."\n";
        $base .= "Territory: {$this->territory}" . " acres\n";
        $base .= "Garage: {$this->garage}" . "\n";

        return $base;
    }
}

$apt3 = new House('South str.113, Boston, USA', 77.5, 1, 2000, 15, 1);
$apt4 = new House('Fleet str. 676, Miami, USA', 100, 1, 999, 20, 2);