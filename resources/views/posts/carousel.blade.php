
@push('styles')
  <link rel="stylesheet" type="text/css" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.css">
@endpush


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach ($post->photos as $photo)
       <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach ($post->photos as $photo)
        <div class="item {{ $loop->first ? 'active' : '' }}">
          <img src="/storage/{{ $photo->url_image }}">
      </div>
    @endforeach

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@push('scripts')
  <script type="text/javascript" src="/adminlte/bower_components/jquery/dist/jquery.js"></script>
  <script type="text/javascript" src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.js"></script> 
@endpush
