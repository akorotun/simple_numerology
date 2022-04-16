<?php

    namespace App\Http\Controllers;

    use App\Models\Article;
    use Illuminate\Support\Facades\DB;

    class ArchiveArticlesController extends Controller
    {
        public function index($year, $month)
        {
//            dd(
//                Article::query()
//                    ->whereYear('created_at', $yy)
//                    ->whereMonth('created_at', $mm)
//                    ->get()
//            );
            $data = [
            'title'=>"Архів $year.$month",
            'year'=>$year,
            'month'=>$month,
            'articles_group'=>Article::getPublishedMonthes(),//вызвали функцию для блока архив
            'articles'=>Article::query()
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->get()
            ];
            return view('articles.archive_articles')->with($data);
        }
    }
