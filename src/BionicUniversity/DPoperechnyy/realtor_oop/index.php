<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */

spl_autoload_register(function ($class) {
    if (file_exists('classes/' . $class . '.php')) {
        include 'classes/' . $class . '.php';
    }
});

function stdin(){
    $stdin = fopen('php://stdin', 'r');
    $line = trim(fgets($stdin));
    fclose($stdin);
    return $line;
}

echo "Enter Realtor's full name:\n";
$string = stdin();

if ($string === '') {
    echo "Empty string";
    return;
} else {
    $realtor = new Realtor($string);
}

echo "Hi. My name is: {$realtor->getName()}. I'm a real Realtor\n";
echo "Housing of what square are you looking for?\nEnter float value:\n";
$square = stdin();
$realtor->checkHouse($square);
