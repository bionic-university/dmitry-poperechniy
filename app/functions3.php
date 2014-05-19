<?php
/**
 * 26. Найти пропущенный элемент в массиве, в котором есть все числа от 0 до 99 кроме одного (его и найти)
 *
 * @param array $arr
 * @return float
 */
function findMissingNumber($arr) {
	assert(is_array($arr));
    $n = count($arr);

    //get the sum of numbers including missing number
    $total = ($n + 1) * ($n + 2) / 2;
	
    //Subtract all the numbers from sum and you will get the missing number.
    for ($i = 0; $i < $n; $i++) 
        $total -= $arr[$i];

    return $total;
}

/**
 * 18) Найти моду чисел в массиве
 *
 * @param array $arr
 * @return mixed
 */
function findMode1(array $arr) {
    $values = array_count_values($arr);
    $mode = array_search(max($values), $values);

    return $mode;
}

/**
 * Returns the mode value(s) for an array.
 *
 * @param array $arr The array of values to determine the mode.
 * @return array|bool Return mode value if there is only one, array of values if bimodel or FALSE if no mode.
 */
function findMode2(array $arr) {
    assert(is_array($arr));

    $values = array_count_values($arr);
    //sort values in descending order
    arsort($values);
    $modes = array_keys($values, current($values), TRUE);

    // If each value only occurs once, there is no mode
    if (count($arr) === count($values))
        return FALSE;

    // Only one modal value
    if (count($modes) === 1)
        return $modes[0];

    // Multiple modal values
    return $modes;
}

/**
 * 18) Найти медиану чисел в массиве
 *
 * @param $array
 * @return bool|float|null
 */
function findMedian($array) {
    assert(is_array($array));
    $count = count($array);

    if ($count == 0) 
        return FALSE;
    
    sort($array, SORT_NUMERIC);    
    return $array[floor($count / 2)];
}

/**
 * 1.Для заданого числа сгенерировать массив с числами возрастающими от центра
 * 6   4   2   1   3   5   7
 *
 * @param $n
 * @return array
 */
function pendulumGenerator($n) {
	$arr = array();
	
	for ($i = 0; $i < floor($n / 2); $i++)
			$arr[$i] = ($n - $n % 2) - 2 * $i;
		
	for ($i = floor($n / 2); $i < $n; $i++)
			$arr[$i] = 1 + 2 * ($i - (floor($n / 2)));

	return $arr;
}

/**
 * 2. Повторить 1) но заполнять числами Фибоначи (нельзя использовать рекурсию, вспомогательные массивы)
 *
 * @param $n
 * @return int
 */
function fibonaciNumber($n) {	
	//return $n < 3 ? 1 : fibonaciNumber($n - 1) + fibonaciNumber($n - 2);
	$a1 = 1;
	$a2 = 1;
	
	for ($i = 1; $i < $n; $i++){
		$a2 = $a2 + $a1;
		$a1 = $a2 - $a1;
	}
	
	return $a1;
}

function pendulumFibonaciGenerator($n) {
	$arr = array();
	$arr = pendulumGenerator($n);
	
	for ($i = 0; $i < count($arr); $i++) {
		$arr[$i] = fibonaciNumber($arr[$i]);
	}	
	
	return $arr;
}

function pendulumFibonaciIteration($n) {
	$arr = array();
	$i = floor($n / 2);
	$x = 1;
	//merge with fibonaciNumber
	while ($i < $n && $i >= 0) {
		$arr[$i] = $x;
		$i += pow(-1, $x % 2) * $x++;
	}
	
	return $arr;
}

/**
 * 3) Найти н-тое по счету самое большое число в массиве
 *
 * @param $arr
 * @param $limit
 * @return bool
 */
function findLimitedMax($arr, $limit) {
	$max = false;
	if ($limit === false)
		return false;
	
	for ($i = 0; $i < count($arr); $i++) {
		if ($arr[$i] >= $limit)
			continue;
		
		if ($max === false)
			$max = $arr[$i];
		else if ($arr[$i] > $max)
			$max = $arr[$i];
	}
	return $max;
}

function findNthMax($arr, $n) {
	$max = 100000;	
	for ($i = 0; $i < $n; $i++) 
		$max = findLimitedMax($arr, $max);
	
	return $max;	
}

/**
 * 7) Найти все числа от 1 до 1000 двоично представления которых является полиндромом.
 *
 */
function isPolindrom($n)
{
    $reversed = 0;
    $original = $n;

    while ($n > 0) {
        $reversed = $reversed * 10 + $n % 10;
        $n = floor($n / 10);
    }

    return ($reversed == $original);
    //return $reversed == $original ? true : false;
}

function convertDecimalTo($n, $base)
{
    $ostatok = '';

    while ($n > 0) {
        $temp = $n % $base;
        $ostatok = $temp.$ostatok;
        $n = floor($n / $base);
    }
    return $ostatok;
}

function findPolindroms($from, $to)
{
    for ($i = $from; $i <= $to; $i++){
        $n = convertDecimalTo($i, 2);

        if (isPolindrom($n)) {
            //как тут можно возвращать без echo?
            echo $n . "<br/>";
        }
    }
}


/**
 * 8) Найти все числа от 1 до 1000 в троичной записи которых количество нулей, едениц и двоек - одинаково.
 */
function findEqualNumbersInTernary($from , $to)
{
    for ($i = $from; $i <= $to; $i++) {
        $n = convertDecimalTo($i, 3);

        $temp = $n;
        $zero = 0;
        $one = 0;
        $two = 0;

        while ($n > 0) {
            $ostatok = $n % 10;

            if ($ostatok == 0) {
                $zero++;
            } else if ($ostatok == 1) {
                $one++;
            } else {
                $two++;
            }

            $n = floor($n / 10);
        }

        if ($zero == $two && $two == $one) {
            echo $temp . "<br/>";
        }
    }
}

/**
 * 9) Найти все числа от 1 до 1000 для которых записи в двоичной, троичной, пятеричной
 * системе счисления -   отсортированы (для всех одновременно)
 */
//check if number is sorted
function sorted ($n)
{
    $arr = [];
    //convert int to array
    while ($n > 0) {
        $ostatok = $n % 10;
        array_push($arr, $ostatok);
        $n = floor($n / 10);
    }
    //check if array is sorted
    for ($i = 1; $i < count($arr); $i++){
        if ($arr[$i - 1] < $arr[$i]) {
            return false;
        }
    }
    return true;
}

function findSorted2_3_5Numbers($from, $to)
{
    for ($i = $from; $i <= $to; $i++) {
        $n_2 = convertDecimalTo($i, 2);
        $n_3 = convertDecimalTo($i, 3);
        $n_5 = convertDecimalTo($i, 5);

        if (sorted($n_2) && sorted($n_3) && sorted($n_5)) {
            echo $i . "<br/>";
        }
    }
}