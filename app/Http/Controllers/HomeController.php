<?php

namespace App\Http\Controllers;

use App\Models\User;// - добавил вручную
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $data = [
            'title'=>'Кабінет користувача',
            'articles'=> $user->articles
        ];
        return view('home')->with($data);
    }
}
