<?php

$array_numeric = [18, 10, 1981];

$array_marge =[];
for ($i = 0; $i < count($array_numeric); $i++){
    $array = [];
    while ($array_numeric[$i] > 0) {
        $array[] = $array_numeric[$i] % 10;
        $array_numeric[$i] = intval($array_numeric[$i] / 10);
    }
//        print_r(array_reverse($array));
//        echo '<br>';
    $array_marge = array_merge($array_marge, array_reverse($array));
}
echo 'Массив с цифрами: <br>';
print_r($array_marge);
echo '<br>';

$sum = array_sum($array_marge);
echo 'сумма: ' . $sum;
echo '<br>';

$number_fate_01 = 0;
$number_fate_02 = 0;

while ($sum > 9){
    $array_fate = [];
    while ($sum > 0) {
        $array_fate[] = $sum % 10;
        $sum = intval($sum / 10);
    }
    $array_day_fate = array_reverse($array_fate);
    print_r($array_fate);
    echo '<br>';
    $sum = array_sum($array_fate);
    echo "сумма: " . $sum;
    echo '<br>';

    if($array_fate[0] + $array_fate[1] < 9){
        $number_fate_01 = $array_fate[0];
        $number_fate_02 = $array_fate[1];
    }
}
$number_fate = $sum;
echo 'день судьбы 01: ' . $number_fate_01 . '<br>';
echo 'день судьбы 02: ' . $number_fate_02 . '<br>';
echo '<b>день судьбы: ' . $number_fate . '</b><br>';



