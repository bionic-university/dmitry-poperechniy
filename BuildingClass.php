<?php
abstract class AbstractBuilding
{
    protected $title;
    protected $area = 0;
    protected $price;
    protected $numberOfRooms;
    protected $numberOfFloors;
    protected $location;
    protected $yearOfConstruction;
    protected $discount = 0;
    protected $owner;

    public function __construct(
        $title, $area, $price, $discount, $numberOfRooms,
        $numberOfFloors, $location, $yearOfConstruction, $owner
    ) {
        $this->title = $title;
        $this->area = $area;
        $this->price = $price;
        $this->discount = $discount;
        $this->numberOfRooms = $numberOfRooms;
        $this->numberOfFloors = $numberOfFloors;
        $this->location = $location;
        $this->yearOfConstruction = $yearOfConstruction;
        $this->owner = $owner;
    }

    protected function getTitle(){
        return $this->title;
    }

    protected function getArea(){
        return $this->area;
    }

    protected function getPrice(){
        return ($this->price - $this->discount);
    }

    protected function getNumberOfRooms(){
        return $this->numberOfRooms;
    }

    protected function getNumberOfFloors(){
        return $this->numberOfFloors;
    }

    protected function getLocation(){
        return $this->location;
    }

    protected  function getYearOfConstruction(){
        return $this->yearOfConstruction;
    }

    protected  function getOwner(){
        return $this->owner;
    }

    protected function write(){
        $base = "{$this->getTitle()} of {$this->getArea()} area at {$this->getPrice()}.\n";
        $base .= "{$this->getNumberOfRooms()} rooms. {$this->getNumberOfFloors()} floors.\n";
        $base .= "Location: {$this->getLocation()}. Building of {$this->getYearOfConstruction()} year.\n";
        $base .= "Owner: {$this->getOwner()}.\n";
        return $base;
    }

    abstract protected function sell($owner);

    abstract protected function buy($owner);

    abstract protected function populate();

}


class House extends AbstractBuilding
{
    private $livingArea = 0;
    private $notLivingArea = 0;
    protected $windows = new Window(10, 'plastic');
    protected $doors = new Door(5, 'wood');

    public function __construct(
        $title, $area, $price, $discount, $numberOfRooms,
        $numberOfFloors, $location, $yearOfConstruction, $owner,
        $livingArea, $notLivingArea
    ) {
        parent::__construct(
            $title, $area, $price, $discount, $numberOfRooms,
            $numberOfFloors, $location, $yearOfConstruction, $owner);

        $this->livingArea = $livingArea;
        $this->notLivingArea = $notLivingArea;
    }

    public function write(){
        $base = parent::write();
        $base .= "Living area: {$this->livingArea}. Not living area: {$this->notLivingArea}.\n";
        return $base;
    }

    public function sell($owner){
        $this->owner = new Owner($name, $surname);
    }

    public function buy($owner){
        $this->owner = new Owner($name, $surname);
    }

    public function populate(){
        echo "This house is populated";
    }
}

class Window
{
    public $numberOfWindows;
    public $material;

    public function __construct(
        $numberOfWindows, $material
    ) {
        $this->numberOfWindows = $numberOfWindows;
        $this->material = $material;
    }

    public function open(){
        echo "Window is open";
    }

    public function close(){
        echo "Window is close";
    }
}

class Door
{
    public $numberOfDoors;
    public $material;

    public function __construct(
        $numberOfDoors, $material
    ) {
        $this->numberOfDoors = $numberOfDoors;
        $this->material = $material;
    }

    public function open(){
        echo "Door is open";
    }

    public function close(){
        echo "Door is close";
    }
}

class Owner
{
    public $name;
    public $surname;

    public function __construct($name, $surname){
        $this->name = $name;
        $this->surname = $surname;
    }
}