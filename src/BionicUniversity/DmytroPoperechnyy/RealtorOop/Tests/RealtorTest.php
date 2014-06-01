<?php

namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Tests;

use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Realtor;

/**
 * Class RealtorTest
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Tests
 */
class RealtorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test getting Realtor's name
     */
    public function testGetName()
    {
        $realtor = new Realtor('John Doe', 'West str. 123, Los Angeles');
        $this->assertEquals('John Doe', $realtor->getName());
    }

    /**
     * Test getting Realtor's contact info
     */
    public function testGetContact()
    {
        $realtor = new Realtor('Jane Doe', 'Sunset blvr. 987, Miami, USA');
        $this->assertEquals('Sunset blvr. 987, Miami, USA', $realtor->getContact());
    }

    /**
     * Test setting name
     */
    public function testSetName()
    {
        $realtor = new Realtor('Johny Walker', 'East str. 234, New York, USA');
        $name = "Homer Simpson";
        $realtor->setName($name);
        $this->assertEquals($name, $realtor->getName());
    }

    /**
     * Test setting contact
     */
    public function testSetContact()
    {
        $realtor = new Realtor('Crusty', 'South str. 567, Boston, USA');
        $contact = 'North str. 876, Springfield, USA';
        $realtor->setContact($contact);
        $this->assertEquals($contact, $realtor->getContact());
    }


}