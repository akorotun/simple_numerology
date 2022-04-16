<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberFate extends Model
{
    use HasFactory;

    public function sum_numbers($array_numeric)
    {
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
//        echo 'Массив с цифрами: <br>';
//        print_r($array_marge);
//        echo '<br>';

        $sum = array_sum($array_marge);
//        echo 'сумма: ' . $sum;
//        echo '<br>';

        $sum_01 = 0;
        $sum_02 = 0;

        while ($sum > 9){
            $array_2 = [];
            while ($sum > 0) {
                $array_2[] = $sum % 10;
                $sum = intval($sum / 10);
            }
            $array_day_fate = array_reverse($array_2);
//            print_r(array_reverse($array_2));
//            echo '<br>';
            $sum = array_sum(array_reverse($array_2));
//            echo "сумма: " . $sum;
//            echo '<br>';

            if($array_2[0] + $array_2[1] < 9){
                $sum_01 = array_reverse($array_2)[0];
                $sum_02 = array_reverse($array_2)[1];
            }
        }
//        $arr = [$sum, $sum_01, $sum_02];
//        var_dump($arr);
        return $sum;
    }
}
