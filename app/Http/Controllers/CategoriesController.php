<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    public function show(Category $category){

    	//return $category->posts;
    	return view('pages.home', [
    		'title' => "Publicaciones de la Categoría '{$category->name}'",
    		'posts' => $category->posts()->paginate(1)
    	]);

    }
}
