<?php
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Storage::disk('public')->deleteDirectory('posts');

        $post = new Post;
        $category = new Category();
        $category->name = 'Categoria 1';
        $category->save();

        $category = new Category();
        $category->name = 'Categoria 2';
        $category->save();

        $tag = new Tag();
        $tag->name = "Etiqueta 1";
        $tag->save();

        $tag = new Tag();
        $tag->name = "Etiqueta 2";
        $tag->save();

        $tag = new Tag();
        $tag->name = "Etiqueta 3";
        $tag->save();

        $tag = new Tag();
        $tag->name = "Etiqueta 4";
        $tag->save();

        $post->title = 'Mi primer Post';
        $post->url = str_slug('Mi primer Post');
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut labore doloremque pariatur nobis sequi cumque eos vel natus, nam hic. Ipsam velit consequatur quod mollitia provident nobis reiciendis nam, ducimus</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach('1');

        $post = new Post;
        $post->title = 'Mi segundo Post';
        $post->url = str_slug('Mi segundo Post');
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut labore doloremque pariatur nobis sequi cumque eos vel natus, nam hic. Ipsam velit consequatur quod mollitia provident nobis reiciendis nam, ducimus</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach('2');
        $post->tags()->attach('4');

        $post = new Post;
        $post->title = 'Mi tercer Post';
        $post->url = str_slug('Mi tercer Post');
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut labore doloremque pariatur nobis sequi cumque eos vel natus, nam hic. Ipsam velit consequatur quod mollitia provident nobis reiciendis nam, ducimus</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach('3');
        $post->tags()->attach('1');

        $post = new Post;
        $post->title = 'Mi cuarto Post';
        $post->url = str_slug('Mi cuarto Post');
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut labore doloremque pariatur nobis sequi cumque eos vel natus, nam hic. Ipsam velit consequatur quod mollitia provident nobis reiciendis nam, ducimus</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach('4');
        $post->tags()->attach('3');

        $post = new Post;
        $post->title = 'Mi quinto Post';
        $post->url = str_slug('Mi quinto Post');
        $post->excerpt = "Extracto de mi quinto post";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut labore doloremque pariatur nobis sequi cumque eos vel natus, nam hic. Ipsam velit consequatur quod mollitia provident nobis reiciendis nam, ducimus</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach('2');
        $post->tags()->attach('3');
    }
}
