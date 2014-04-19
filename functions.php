<?php
/**
 * 26. Найти пропущенный элемент в массиве, в котором есть все числа от 0 до 99 кроме одного (его и найти)
 *
 * @param array $arr
 * @return int
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