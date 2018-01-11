@extends('layout')

@section('meta-title', $post->title . " | " . config('app.name'))
@section('meta-description', $post->excerpt)

@section('content')

<article class="post container">
            @if($post->photos->count() === 1)
                <figure style="width: 100%;">
                  <img src="/storage/{{ $post->photos->first()->url_image }}" 
                  alt="" 
                  class="img-responsive">
                </figure>
                @elseif($post->photos->count() > 1)
                  @include('posts.carousel') 
                @elseif($post->iframe)
                <div class="video">
                    {!! $post->iframe !!}
                </div>
                @endif        
             
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{ optional($post->published_at)->format('M d') }}</span>
        </div>
        @if ($post->category)
          <div class="post-category">
            <span class="category">{{ $post->category->name }}</span>
          </div>
        @endif

      </header>
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
          
          {!! $post->body !!}

        <footer class="container-flex space-between">
          @include('partials.social-links', ['description' => $post->title])
          <div class="tags container-flex">
             @foreach($post->tags as $tag)
               <span class="tag c-gris text-capitalize">#{{ $tag->name}}</span> 
             @endforeach
          </div>
      </footer>

      @include('partials.disqus-script')
	
		    </div>
  </article>
@endsection

@push('scripts')

	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush