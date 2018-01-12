<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    //para que sea instancia de carbon
    protected $dates = ['published_at'];
    protected $fillable = ['title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'];


    public function category() {// $post->category->name
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName(){
        return 'url';
    }

    public function scopePublished($query){
    	$query->whereNotNull('published_at')
    			  ->where('published_at', '<=', Carbon::now() )
                  ->latest('published_at');
    }

    public function scopeAllowed($query){

        if(auth()->user()->can('view', $this)){
            return $query;
        }

        return $query->where('user_id', auth()->id());

    }


    public function isPublished(){
        return ! is_null($this->published_at) && $this->published_at < today();
    }

/*    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;

        $url = str_slug($title);

        $duplicatedUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

        if( $duplicatedUrlCount ){

            $url .= "-" . ++$duplicatedUrlCount;
        }

        $this->attributes['url'] = $url;
    }*/


    public static function create(array $attributes = []){

        $attributes['user_id'] = auth()->id();                                                              

        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }


    protected function generateUrl(){

        $url = str_slug($this->title);

        if($this->where('url', $url)->exists()){
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;

        $this->save();

    }



    public function setPublishedAtAttribute($published_at){
        $this->attributes['published_at'] = $published_at !== null ?  Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category){
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags){
        $tags = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tags);
    }


    protected static function boot(){

        parent::boot();

        static::deleting(function($post){
          
            $post->tags()->detach();
            $post->photos->each->delete();

        });
    }




     public function viewType($home = ''){
        if($this->photos->count() === 1):

            return 'posts.photo';

              elseif($this->photos->count() > 1):

                return $home === 'home' ? 'posts.gallery-preview' : 'posts.carousel';

              elseif($this->iframe):

                return 'posts.iframe';
                
              else :
                return 'posts.text';
            endif;
    }
}
