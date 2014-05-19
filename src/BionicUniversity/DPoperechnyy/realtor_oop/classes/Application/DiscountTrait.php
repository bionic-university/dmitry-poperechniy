<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/12/14
 * Time: 1:05 AM
 */

namespace Realtor\Application;

/**
 * Class DiscountTrait
 * @package Realtor\Application
 */
trait DiscountTrait
{
    protected $discount = 50;

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
} 