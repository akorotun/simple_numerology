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
        $sum = array_sum($array);
        return $sum;
    }
}
