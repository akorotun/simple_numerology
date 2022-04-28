<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $text
 * @property string $image
 * @property int $user_id
 * @property string $category
 */

class Article extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo('App\Models\User');
        // belongsTo - статья может быть прикреплена только к одному пользователю
    }

    /**
     * @property array $articles_group
    */

    public static function getPublishedMonthes()
    {
        return Article::query()
        ->select(DB::raw("DATE_FORMAT(created_at, '%Y/%m') AS month"))
        ->groupBy('month')
        ->orderByDesc('month')
        ->get();
    }
}
