<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function html(){
        $arrHtml = Category::join('posts', 'categories.id', '=' , 'posts.category_id')->where('categories.id',1)->paginate(1);
        return view('categories.html',compact('arrHtml'));
    }

    public function css(){
        $arrCss = Category::join('posts', 'categories.id', '=' , 'posts.category_id')->where('categories.id',2)->paginate(1);
        return view('categories.css',compact('arrCss'));
    }

    
    public function js(){
        $arrJs = Category::join('posts', 'categories.id', '=' , 'posts.category_id')->where('categories.id',3)->paginate(1);
        return view('categories.js',compact('arrJs'));
    }
}
