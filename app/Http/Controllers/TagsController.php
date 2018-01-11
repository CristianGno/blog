<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    
    public function show(Tag $tag){

    	return view('welcome', [
    		'title' => "Publicaciones de la Etiqueta '{$tag->name}'",
    		'posts' => $tag->posts()->paginate(1)
    	]);    	
    }
}
