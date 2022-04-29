<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Simple Numerology',
            'articles' => Article::all(),
            'articles_last' => Article::orderBy('id', 'desc')->where('category', 'Проста нумерологія')->take(2)->get(),
            'articles_group'=>Article::getPublishedMonthes()//вызвали функцию для блока архив
        ];
        return view('static.index')->with($data);
    }

    public function about()
    {
        $data = ['title' => 'Про нас'];
        return view('static.about')->with($data);
    }
}
