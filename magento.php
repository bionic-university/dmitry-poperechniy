<?php
/*
'discount_amount' => 15.01;  'discount_amount' => 15.0100;
50.2 => 50.2000;
number_format(number);
first sort by values because they can be unsorted asort();
$data['discount_amount'] = floor($data['discount_amount']);
*/
/*
function verify($a1, $a2)   //Notice: Array to string conversion
    return !array_diff($a1, $a2) && !array_diff($a2, $a1);
*/
echo "Magento: findIfArraysEqual: " . "<br/>";
$fixture =
    ['name' => 'CatalogPriceRule 2110063786',
        'description' => 'Catalog Price Rule Description',
        'is_active' => 'Active',
        'website_ids' =>
            ['option_0' => 'Main Website',
                'option_1' => 'Shop Website'],
        'customer_group_ids' =>
            ['option_0' => 'NOT LOGGED IN',
                'option_1' => 'General'],
        'simple_action' => 'By Percentage of the Original Price',
        'discount_amount' => '50'
    ];

$data =
    ['name' => 'CatalogPriceRule 2110063786',
        'description' => 'Catalog Price Rule Description',
        'is_active' => 'Active',
        'website_ids' =>
            ['0' => 'Main Website',
                '1' => 'Shop Website'],
        'customer_group_ids' =>
            ['0' => 'NOT LOGGED IN',
                '1' => 'General'],
        'simple_action' => 'By Percentage of the Original Price',
        'discount_amount' => '50.0000'
    ];

function checkIfArraysEqualByValue($arr1, $arr2) {
    foreach ($arr1 as $key => $value) {
        echo $value ."<br/>";
        if (is_array($value)) {
            $value = array_values($value);
            foreach ($value as $key => $value) {
                echo $value ."<br/>";
            }
        }
    }
}

echo checkIfArraysEqualByValue($fixture, $data);

var_dump($fixture);