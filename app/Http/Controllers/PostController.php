<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Post;
use App\Models\PostCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller{

    public function index(){

        $posts = Post::with('category')->get();

        return view('admin.pages.posts.index', ['posts' => $posts]);
    }

    public function create(){
        $categories = PostCategories::get();

        return view('admin.pages.posts.create', ['categories' => $categories]);
    }

    public function post(Request $request){
        $data['title'] = $request->input('title');
        $data['slug'] = Str::of($request->input('title'))->slug('-');
        $data['description'] = $request->input('description');
        $data['post_category_id'] = $request->input('category');
        $data['updated_by'] = Auth::user()->id;

        Post::create($data);

        return redirect()->route('admin.posts')->with(['success' => 'Post criado com sucesso']);
    }

    public function edit(Request $request){

        $posts = Post::find($request->input('id'));
        $categories = PostCategories::get();

        return view('admin.pages.posts.edit', ['post' => $posts, 'categories' => $categories]);
    }

    public function update(Request $request){

        $post = Post::find($request->input('post_id'));
        if ($post){
            $data['title'] = $request->input('title');
            $data['slug'] = Str::of($request->input('title'))->slug('-');
            $data['description'] = $request->input('description');
            $data['post_category_id'] = $request->input('category');
            $data['updated_by'] = Auth::user()->id;

            $post->clearMediaCollection('default');
            $post->addMedia($request->file('image'))->toMediaCollection('default');

            $post->update($data);
            return redirect()->route('admin.posts')->with(['success' => 'Post atualizado com sucesso']);
        } else {
            return redirect()->route('admin.posts')->with(['error' => 'Não foi possível atualizar o post']);
        }
    }
}