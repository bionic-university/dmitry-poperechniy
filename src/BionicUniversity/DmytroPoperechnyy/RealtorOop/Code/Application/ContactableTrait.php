<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/12/14
 * Time: 1:05 AM
 */

namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application;

/**
 * Class ContactableTrait
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application
 */
trait ContactableTrait
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