@extends('layouts.app')
@section('content')
<div class="container">



@if($errors->any())

   <div class="alert alert-danger">
       <ul>

       @foreach($errors->all() as $error)
           <h4>Attenzione!!</h4>
           <li>{{$error}}</li>


       @endforeach   

       </ul>

  
   </div>

@endif
<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
  <div class="mb-3">
      <label for="titolo" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="titolo" value="{{ old('title', $post->title)}}" name="title">
      
  </div>

  <div class="mb-3">
      <label for="cat" class="form-label">Category</label>
      <select class="form-control" name="category_id" id="cat">
        <option value=""> Scegli una categoria...</option>
         @foreach($categories as $category)
      
           <option value="{{ $category->id}}"

              @if($category->id == old('category_id', $post->category_id)) selected @endif>
               {{ $category->name }}
            
            </option>
                 
         @endforeach

          

      </select>
      
  </div>

  <div class="mb-3">
     @if($post->cover)
        <img src="{{asset('storage/'. $post->cover)}}" alt="">

      @endif
  </div>


  <div  class="mb-3">
    

    <label for="img" class="form-label">Immagine</label>
    <input type="file"id="img" name="image" class="form-control-file @error('image') is-invalid @enderror">
    @error('image')
        <div class="alert alert-danger">{{$message}}</div>

    @enderror



  </div>


  <div class="mb-3">
     <label for="desc" class="form-label">Descrizione</label>
     <textarea class="form-control" name="content" id="desc" cols="30" rows="10"> {{ old('content', $post->content)}}</textarea>
     
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>

@endsection