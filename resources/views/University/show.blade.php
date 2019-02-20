@extends('layouts.app')

@section('content')

  <div class="row jumbotron">
      <div class="col-2" >
        <a href="/university">
          <ion-icon name="arrow-round-back"></ion-icon>
        </a>
      </div>

    <div class="col-8">
      <h2 class="text-center"> Welcome to {{ $user->univeristy }} </h2>
      <sub></sub>
      <p class="text-center">You'll find all the materials you'll need for your studies here </p>
    </div>
  </div>


  {{-- space on the right --}}
  <div class="row">
    <div class="col-2">
    </div>
    


    {{-- card for each file entry --}}
    @foreach ($files as $file)
      <div class="col-2">
        <div class="card mb-3" id="chartstart">
          <div class="card-header">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ $file->description }} 
          </div>
          <div class="card-body">
            <i class="fa fa-download" aria-hidden="true"></i>
            <a href="storage/app/public/{{ $file->file_name}}">Download link</a>
          </div>
          <div class="card-footer small text-muted">{{ $file->updated_at }}</div>
        </div>  
      </div>
    @endforeach
      

    <div class="col-2">
    </div>
  
  </div>

      <br>
      <hr>  
      <br>  

      <div class="jumbotron container " >  
          <form enctype='multipart/form-data' action="university/store" method="post">
            @csrf
    
            <div class="form-group">
              <label for="Subject">Subject Name:</label>
              <input placeholder="Software Engineering" type="text" name="subject" class="form-control" id="Subject">
            </div>
    
            <div class="form-group">
              <label for="Description">Description</label>
              <textarea placeholder="Lecture 1" class="form-control" id="Description" name="description"rows="3"></textarea>
            </div>

            <div class="form-group">            
              <label for="uploadedFile">Upload Content</label>
              <input type="file" name="file" class="form-control-file" id="uploadedFile">
            </div>

            <button type="submit"> Submit</button>
          </form>
        </div>
  </div>

@endsection
