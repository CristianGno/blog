<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Abraham\TwitterOAuth\TwitterOAuth;
class PageController extends Controller
{
    public function home(){
    $posts = Post::published()->paginate(3);
    $url_connection = '';

    return view('pages/home', compact('posts', 'url_connection'));
    }

    public function about(){
      $namePage = "Nosotros";
      return view('pages.about', compact('namePage'));
    }

    public function archive(){
      $namePage = "Archivo";
      return view('pages.archive', compact('namePage'));
    }

    public function contact(){
      $namePage = "Contacto";
      return view('pages.contact', compact('namePage'));
    }


}
