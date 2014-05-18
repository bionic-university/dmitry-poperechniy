<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/12/14
 * Time: 1:05 AM
 */

namespace Realtor\General;

/**
 * Class TraitContactable
 * @package Realtor\Housing
 */
trait TraitContactable
{
    protected $contact;

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }
} 