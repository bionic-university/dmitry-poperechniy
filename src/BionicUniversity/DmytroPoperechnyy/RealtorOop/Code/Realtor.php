<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\RealtorOop\Code;

use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\DesribableInterface;
use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\ContactableTrait;
use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\Apartment;
use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\House;
use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\Room;
use BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Application\AbstractHousing;

/**
 * Class Realtor that implements DescribableInterface
 *
 * Class Realtor
 * @package BionicUniversity\DmytroPoperechnyy\RealtorOop\Code
 */
class Realtor implements DesribableInterface
{
    use ContactableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $database = [];

    /**
     * @param $name
     * @param $contact
     */
    public function __construct($name, $contact)
    {
        $this->name = $name;
        $this->contact = $contact;
	    $this->importDatabase();
    }

    /**
     * fill database with rooms, apartments, houses
     */
    public function importDatabase()
    {
        $this->database = [
            new Apartment('West str.123, New York, USA', 50.5, 1, 1000, 2, $this->contact), 
            new Apartment('East str.987, California, USA', 77.5, 1, 900, 3, $this->contact),
            new House('South str.113, Boston, USA', 77.5, 1, 2000, 15, 1, $this->contact),
            new House('Fleet str. 676, Miami, USA', 100, 1, 999, 20, 2, $this->contact),
            new Room('Sunset bulv. 564, San Francisco', 40, 1, 499, 1, $this->contact),
            new Room('Sherlock Holms str. 111, London, UK', 50.5, 1, 700, 0, $this->contact)
        ];                
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param float $space
     */
    public function checkHouse($space)
    {
		foreach ($this->database as $housing) {
		if ($housing instanceof AbstractHousing) {
			if ($housing->getSquare() >= $space && $housing->getAvailability() == 1 && $housing->verifyData()) {
				$housing->printOut();
                                echo "\n";
				}
			}
		}		
    }

    /**
     * Realtor greeting
     */
    public function greeting()
    {
        echo "Hi. " . $this->getDescription() . "\n"
        . "Housing of what square are you looking for?\nEnter float value:\n";
    }

    /**
     * Realtor description
     *
     * @return string
     */
    public function getDescription()
    {
        return "My name is: {$this->name}. I'm a Realtor\nYou can contact me at: {$this->contact}\n";
    }
}