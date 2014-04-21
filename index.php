<?php
require_once('functions.php');

function showArray($a)
{
	for ($i = 0; $i < count($a); $i++)
		echo $a[$i] . ' ';
		
	echo "<br />";
}

header('Content-Type: text/html; charset=utf-8');

$a = array(7, 2, 3, 4, 5, 6, 1, 8, 10, 9, 12);

echo "1. Missing number in array: ".findMissingNumber($a)."<br/>";

$a2 = array(1, 2, 3, 4, 3, 5, 6, 7, 8, 10, 9, 12, 4, 5, 6, 1, 5, 5, 78,6 ,8, 45, 5, 5);

echo "2. Find mode in array: ".findMode1($a2)."<br/>";

$single_mode = array('a', 'b', 'a', 'b', 'c', 'a');
$multi_mode  = array(0, 0, 2, 2, 1, 1, 3);
$no_mode     = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

echo "2. Find mode in array V2: ".findMode2($single_mode)."<br/>";

$a3 = array(5, 1, 3, 25, 19, 17, 21, 19);

echo "3. Find median in array: ".findMedian($a3)."<br/>";

echo "1. Generate pendulum: ".showArray(pendulumGenerator(5))."<br/>";

echo "1.1. Generate pendulumFibonaci: ".showArray(pendulumFibonaciGenerator(7))."<br/>";

echo fibonaciNumber(1) . "<br />";
echo fibonaciNumber(2) . "<br />";
echo fibonaciNumber(3) . "<br />";
echo fibonaciNumber(4) . "<br />";
echo fibonaciNumber(5) . "<br />";

echo "1.2. Generate pendulumFibonaciIteration: ".showArray(pendulumFibonaciIteration(20))."<br/>";


$a3 = array(5, 1, 3, 25, 19, 17, 21, 19);

echo "Find findNthMax: ".findNthMax($a3, 1)."<br/>";
echo "Find findNthMax: ".findNthMax($a3, 2)."<br/>";
echo "Find findNthMax: ".findNthMax($a3, 3)."<br/>";
echo "Find findNthMax: ".findNthMax($a3, 4)."<br/>";
echo "Find findNthMax: ".findNthMax($a3, 5)."<br/>";









