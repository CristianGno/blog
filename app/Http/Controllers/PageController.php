<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Abraham\TwitterOAuth\TwitterOAuth;
class PageController extends Controller
{
    public function home(){
    $posts = Post::published()->paginate(3);
/*    $twitter = new TwitterOAuth('I6jbw2fAFRNCZknM1nbsuTDAu',
     'uuNeBmrE8VERXLjkaCTh1AqI1eWIIJjsXJ7KbAyf1el5wYfSGY',
      '3253383562-gBTfeL9rruVt58hhkKtTSd4OpTJVSYCLiR3xXJj', 
      'mvqL9Sg0UdUJ3xQ6pHsmzV5YfOhhotkfwBmXsw7NPFFbH');

    $twitter->setTimeouts(15,15);

    //$request_token = $twitter->oauth('oauth/request_token', array('oauth_callback' => 'http://blog.deve/'));
    $content = $twitter->get("account/verify_credentials");
   	return $content;*/
    return view('welcome', compact('posts', 'url_connection'));
    }
}
