<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // добавил по примеру, потому что ругалось, что нет класса DB

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(
//            Article::query()
//                ->select(DB::raw("DATE_FORMAT(created_at, '%Y %M') AS month"))
//                ->groupBy('month')
//                ->orderByDesc('month')
//                ->get()
//        );
        $data = [
            'title'=>'Всі статті',
            'articles'=>Article::all(),
            'articles_group'=>Article::getPublishedMonthes()//вызвали функцию для блока архив
        ];
        return view('articles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=>'Створення статті',
            'articles_group'=>Article::getPublishedMonthes()
            ];
        return view('articles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required|max:190|min:5',
                'title' => 'required|max:190|min:10',
                'text' => 'required|min:10'
            ]);

        $article = new Article();
        $article->name = $request->input('name');
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->save();
        return redirect('/articles')->with('success', 'Нова стаття додана');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title'=>"Стаття $id",
            'article'=>Article::find($id),
            'articles_group'=>Article::getPublishedMonthes()
        ];
        return view('articles.show')->with($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title'=>'Редагування статті',
            'article'=>Article::find($id),
            'articles_group'=>Article::getPublishedMonthes()
            ];
        return view('articles.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|max:190|min:5',
                'title' => 'required|max:190|min:10',
                'text' => 'required|min:10'
            ]);

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->save();
        return redirect('/articles')->with('success', 'Стаття оновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('success', 'Стаття була видалена');
    }
}
