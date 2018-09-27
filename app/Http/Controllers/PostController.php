<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function edit(Request $request, Post $post){
        if (\Gate::denies('update-post', $post)){
            abort(403, 'Usuário não tem permissão para editar este post');
        }
        echo $post->title;
    }
}
