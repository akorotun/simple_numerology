<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// добавил по примеру, потому что ругалось, что нет класса DB

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

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
                'text' => 'required|min:10',
                'main_image' => 'nullable|image|max:1999',
                'category' => 'required'
            ]);

        if ($request->hasFile('main_image')) {
            //проверим - есть ли файл при создании новой статьи, если есть, то сделаем имя уникальным (имя+время)
            //берем полное название файла:
            $file = $request->file('main_image')->getClientOriginalName();

            //получим название без расширения:
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            //получим отдельно только расширение файла:
            $ext = $request->file('main_image')->getClientOriginalExtension();

            //получим уникальное имя файла = имя + время + расширение:
            $image_name = $image_name_without_ext . "_" . time() . "." . $ext;

            //добавим загружаемую картинку в проект
            //storeAs загружает данные в storage/app/public/images (создаст папку images)
            //но єта папка не видна пользователю, необходимо сделать перелинковку - php artisan storage:link
            $path = $request->file('main_image')->storeAs('public/images', $image_name);

        } else
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->name = $request->input('name');
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->category = $request->input('category');


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
        if (auth()->user()->id != $data['article']->user_id)
            return redirect('/articles')->with('error', "Ви не можете редагувати цю статтю");

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
//        dd($request->get('text'));
        $this->validate($request,
            [
                'name' => 'required|max:190|min:5',
                'title' => 'required|max:190|min:10',
                'text' => 'required|min:10',
                'category' => 'required'
            ]);

        if ($request->hasFile('main_image')) {
            //проверим - есть ли файл при создании новой статьи, если есть, то сделаем имя уникальным (имя+время)
            //берем полное название файла:
            $file = $request->file('main_image')->getClientOriginalName();

            //получим название без расширения:
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            //получим отдельно только расширение файла:
            $ext = $request->file('main_image')->getClientOriginalExtension();

            //получим уникальное имя файла = имя + время + расширение:
            $image_name = $image_name_without_ext . "_" . time() . "." . $ext;

            //добавим загружаемую картинку в проект
            //storeAs загружает данные в storage/app/public/images (создаст папку images)
            //но єта папка не видна пользователю, необходимо сделать перелинковку - php artisan storage:link
            $path = $request->file('main_image')->storeAs('public/images', $image_name);
        }

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->category = $request->input('category');


        //если передаем новый файл, то меняем и новое имя картинки в статье
        if ($request->hasFile('main_image')) {
            //если будет новый файл, то удаляем старый, кроме noimage.jpg
            if ($article->image != "noimage.jpg")
                Storage::delete('public/images/'.$article->image);
            $article->image = $image_name;
        }


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
        if (auth()->user()->id != $article->user_id)
            return redirect('/articles')->with('error', "Вы не можете видалити цю статтю");

        if ($article->image != "noimage.jpg")
            Storage::delete('public/images/'.$article->image);

        $article->delete();
        return redirect('/articles')->with('success', 'Стаття була видалена');
    }
}
