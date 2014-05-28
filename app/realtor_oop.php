<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/11/14
 * Time: 7:50 PM
 */

require_once __DIR__ . '/../bootstrap.php';

function stdin()
{
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
    $realtor = new BionicUniversity\DmytroPoperechnyy\RealtorOop\Code\Realtor($string, '911');
}

$realtor->greeting();
$square = stdin();
$realtor->checkHouse($square);
