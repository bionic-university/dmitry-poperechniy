<?php
require_once('functions.php');

header('Content-Type: text/html; charset=utf-8');

$a = [1, 2, 3, 4, 5, 6, 7, 8, 10, 9, 12];

echo "1. Missing number in array: ".findMissingNumber($a)."<br/>";

$a2 = [1, 2, 3, 4, 3, 5, 6, 7, 8, 10, 9, 12, 4, 5, 6, 1, 5, 5, 78,6 ,8, 45, 5, 5];

echo "2. Find mode in array: ".findMode1($a2)."<br/>";

$single_mode = ['a', 'b', 'a', 'b', 'c', 'a'];
$multi_mode  = [0, 0, 2, 2, 1, 1, 3];
$no_mode     = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

echo "2. Find mode in array V2: ".findMode2($single_mode)."<br/>";

$a3 = [5, 1, 3, 25, 19, 17, 21, 19];

echo "3. Find median in array: ".findMedian($a3)."<br/>";




