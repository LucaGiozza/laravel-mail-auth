@extends('layouts/app')

@section('content')

<div class="container">
  <!-- primo metodo -->
 @if($errors->any())

<div class="alert alert-danger">


    <ul>
       <h4>Attenzione!!</h4>
        @foreach($errors->all() as $error )
        

        <li>{{$error}}</li>
   

       @endforeach
     </ul>
</div>

@endif 


<!-- inserisco  enctype="multipart/form-data" per le immagini -->

<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
      <label for="titolo" class="form-label">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror"  id="titolo" name="title" value="{{old('title')}}">
      
  </div>
  <div class="mb-3">
      <label for="cat" class="form-label">Categoria</label>
      <select name="category_id" id="cat">


         <option value="">Seleziona una categoria..</option>
         @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option> 

          @if($category->id == old('category_id'))selected

          @endif


         @endforeach

      </select>
      
      
  </div>

<!-- div per le immagini -->
  <div  class="mb-3">
    <label for="img" class="form-label">Immagine</label>
    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
    @error('image')
        <div class="alert alert-danger">{{$message}}</div>

    @enderror



  </div>
  <div class="mb-3">
     <label for="desc" class="form-label">descrizione</label>
     <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="desc" cols="30" rows="10">{{old('content')}}</textarea>
     
  </div>
  <!-- div per i tag -->

  <div class="mb-3">
  <h4>Tag</h4>
    @foreach($tags as $tag)
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
  <input type="checkbox" class="btn-check" id="tag{{$loop->iteration}}" autocomplete="off" value="{{$tag->id}}" name="tags[]"
  
  
  @if(in_array($tag->id, old('tags',[])))

checked


@endif
  
  
  >

  


  <label class="btn btn-outline-primary" for="tag{{$loop->iteration}}">{{$tag->name}}</label>
  
 
</div>
@endforeach


    
    

  </div>
  <div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

  </div>
  
</form>
</div>
@endsection