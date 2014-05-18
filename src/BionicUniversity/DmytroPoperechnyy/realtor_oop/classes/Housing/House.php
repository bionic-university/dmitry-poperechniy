<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:52 PM
 */

namespace Realtor\Housing;

/**
 * Class House
 * @package Realtor\Housing
 */
class House extends AbstractHousing
{
    /**
     * @var float|null
     */
    private $territory;

    /**
     * @var null
     */
    private $garageCount;

    public function __construct(
        $address, $square, $availability = 1,
        $price, $territory, $garageCount = null, $contact
    ) {
        parent::__construct($address, $square, $availability, $price, $contact);
        $this->territory = $territory;
        $this->garageCount = $garageCount;
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
    public function getGarageCount()
    {
        return $this->garageCount;
    }

    /**
     * @param $garageCount
     */
    public function setGarageCount($garageCount)
    {
        $this->garageCount = $garageCount;
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
        $base = "HOUSE: " . "\n";
        $base .= parent::getDescription();
        $base .= "Territory: $this->territory" . " acres\n";
        $base .= "Garage: $this->garageCount" . "\n";

        return $base;
    }

    /**
     * @return bool
     */
    public function verifyData()
    {
        return $this->territory > 0;        
    }
}

