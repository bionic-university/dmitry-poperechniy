<?php

namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Tests;

use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code;

/**
 * Class RealtorTest
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Tests
 */
class RealtorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test getting Realtor's name
     */
    public function testSetName()
    {
        $realtor = new Code\Realtor('John Doe', 'West str. 123, Los Angeles');
        $this->assertEquals('John Doe', $realtor->getName());
    }
}