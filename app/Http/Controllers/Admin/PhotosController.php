<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use Illuminate\Support\Facades\Storage;


class PhotosController extends Controller
{
    public function store(Post $post){

    	$this->validate(request(), [
    		'photo' => 'required|image|max:2048',
    	]);

        $post->photos()->create([
           'url_image' => request()->file('photo')->store('posts', 'public'), 
        ]);

/*		Photo::create([
			'url_image' => request()->file('photo')->store('posts', 'public'),
			'post_id' => $post->id,
		]);*/
    }


    public function destroy(Photo $photo){

    	$photo->delete();

    	return back()->with('flash', 'Foto eliminada correctamente');
    }
}
