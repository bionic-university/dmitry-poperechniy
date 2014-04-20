<?php
/**
 * 26. Найти пропущенный элемент в массиве, в котором есть все числа от 0 до 99 кроме одного (его и найти)
 *
 * @param array $arr
 * @return float
 */
function findMissingNumber($arr) {
    if (!$arr) {
        //throw new Exception('Массив не передан в аргументе функции.');
        echo "Массив не передан в аргумент.";
        die();
    }

    $size = count($arr);

    //get the sum of numbers including missing number
    if ($arr[0] == 0) {
        $total = $size * ($size + 1) / 2;
    } else if ($arr[0] == 1) {
        $total = ($size + 1) * ($size + 2) / 2;
    } else {
        echo 'Массив должен начинаться с 0 или 1.';
        die();
    }
    //Subtract all the numbers from sum and you will get the missing number.
    for ($i = 0; $i < $size; $i++) {
        $total -= $arr[$i];
    }

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
    if (!is_array($arr)) {
        return false;
    }

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
    if (!is_array($array)) {
        return false;
    }
    $count = count($array);

    if ($count == 0) {
        return null;
    }
    sort($array, SORT_NUMERIC);

    $middleIndex = floor($count / 2);
    $median = $array[$middleIndex];
    //if odd $count, middle is the median
    if ($count % 2 != 0) {
        return $median;
    }
    //if even $count, calculate avg of 2 medians
    return ($median + $array[$middleIndex-1]) / 2;
}