<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberSpirit extends Model
{
    use HasFactory;

    function sum_number($numeric)
    {
        $array = [];
        while ($numeric > 0) {
            $array[] = $numeric % 10;
            $numeric = intval($numeric / 10);
        }
//        var_dump(array_reverse($array));
//        die();
        $sum = array_sum(array_reverse($array));

        while ($sum > 9){
            $array_2 = [];
            while ($sum > 0) {
                $array_2[] = $sum % 10;
                $sum = intval($sum / 10);
            }
            $sum = array_sum(array_reverse($array_2));

//            if($array_2[0] + $array_2[1] < 9){
//                $sum_01 = array_reverse($array_2)[0];
//                $sum_02 = array_reverse($array_2)[1];
//            }
        }

        return $sum;
    }
}
