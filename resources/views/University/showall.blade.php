@extends('layouts.app')

@section('content')

  <div class="jumbotron">
    <div class="row">
      <div class="col-2" >
        <a href="/university">
          <ion-icon name="arrow-round-back"></ion-icon>
        </a>
      </div>
      <div class="col-8">
        <h2 class="text-center"> Welcome to {{ $uni->University_name }} </h2>
        <p class="text-center">{{ $uni->intro }}</p>
      </div>
    </div>
  </div>
  {{--  <svg-icon><src href="sprite.svg#si-glyph-city" /></svg-icon>  --}}


  <div class="row">

    @if (empty($files->first()  ))
      <div class="container" style="text-align: center">
          <h3>
            <i class="fa fa-times" aria-hidden="true"></i>       
              No Materials Yet 
          </h3>
      </div>
    @else
      <div class="col-2">
      </div>
    
      @foreach ($files as $file)    
        <div class="col-2">
          <div class="card mb-3">
            <div class="card-header">
              {{ $file->description }} 
            </div>
            <div class="card-body">
              {{-- <canvas id="myAreaChart" width="100%" height="30"></canvas> --}}
              <a href="/download/{{ $file->file_name }}" download >Download link</a>
        
            </div>
            <div class="card-footer small text-muted">{{ $file->updated_at }}</div>
          </div>  
        </div>
      @endforeach
    @endif

    <script type="text/javascript">
      function showMask() {
        var node = document.getElementById('mask123');
        if (node.style.visibility=='visible') {
            node.style.visibility = 'hidden';
        }
        else
            node.style.visibility = 'visible'
    }
    </script>

  </div>
  


@endsection