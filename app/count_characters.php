<?php

function stdin(){
    $stdin = fopen('php://stdin', 'r');
    $line = trim(fgets($stdin));
    $line = strtolower($line);
    fclose($stdin);
    return $line;
}

echo "Enter your string:\n";
$string = stdin();

if ($string === '') {
    echo "Empty string";
    return;
}

$length = mb_strlen($string, 'UTF-8');
echo "For the string: ".$string." with length: ".$length."\n";

$arr = str_split($string);
$values = array_count_values($arr);

foreach ($values as $key => $value) {
    echo "We have ".$value." instance(s) of ".$key." in string.\n";
}

