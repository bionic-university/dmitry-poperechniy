<?php
echo $_SERVER['REMOTE_ADDR'];
phpinfo();

require_once('functions3.php');

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

echo fibonaciNumber(1) . " : ";
echo fibonaciNumber(2) . " : ";
echo fibonaciNumber(3) . " : ";
echo fibonaciNumber(4) . " : ";
echo fibonaciNumber(5) . "<br/>";

echo "1.2. Generate pendulumFibonaciIteration: ".showArray(pendulumFibonaciIteration(20))."<br/>";


$a3 = array(5, 1, 3, 25, 19, 17, 21, 19);

echo "Find findNthMax: ".findNthMax($a3, 1)." / ";
echo "Find findNthMax: ".findNthMax($a3, 2)." / ";
echo "Find findNthMax: ".findNthMax($a3, 3)." / ";
echo "Find findNthMax: ".findNthMax($a3, 4)." / ";
echo "Find findNthMax: ".findNthMax($a3, 5)."<br/>";

echo "7. Find Binary polindroms from 1 to 1000: " . "<br/>";
findPolindroms(1, 10);


echo "8. Find 0, 1, 2 in ternary numbers are equal: " . "<br/>";
//echo convertDecimalTo(666, 3);
echo findEqualNumbersInTernary(1, 20);

echo "9. Найти все числа от 1 до 1000 для которых записи в двоичной," . "<br/>"
    . " троичной, пятеричной системе счисления -   отсортированы: " . "<br/>";
//var_dump(sorted(01234));
findSorted2_3_5Numbers(1,1000);





