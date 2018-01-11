  @extends('layout')

  @section('meta-title', $post->title . " | " . config('app.name'))
  @section('meta-description', $post->excerpt)

  @section('content')

  <article class="post container">

  @include($post->viewType())       
               
      <div class="content-post">
        @include('posts.header')
        <h1>{{ $post->title }}</h1>
          <div class="divider"></div>
            
            {!! $post->body !!}

          <footer class="container-flex space-between">
            @include('partials.social-links', ['description' => $post->title])
            @include('posts.tags')
        </footer>

        @include('partials.disqus-script')
  	
  		    </div>
    </article>
  @endsection

  @push('scripts')

  	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
  @endpush