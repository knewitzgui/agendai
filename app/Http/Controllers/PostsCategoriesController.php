<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsCategoriesController extends Controller{
    
    public function index(){
        $categories = PostCategories::get();

        return view('admin.pages.postsCategories.index', ['categories' => $categories]);
    }

    public function create(){

        return view('admin.pages.postsCategories.create');
    }

    public function post(Request $request){
        $data['name'] = $request->input('name');
        $data['slug'] = Str::of($data['name'])->slug('-');
        $data['updated_by'] = Auth::user()->id;
        
        if(PostCategories::create($data)){
            return redirect()->route('admin.postsCategories.index')->with(['success' => 'Categoria criada com sucesso']);;
        } else {
            return redirect()->back()->with(['error' => 'Slug duplicado, use outro nome']);
        }
    }
}
