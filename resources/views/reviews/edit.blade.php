@extends('layouts.app')


@section('content')
<div class="py-5" style="height: 1300px">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body px-5 text-center">

            <div class="mb-md-5 mt-md-4">

              <h2 class="fw-bold mb-2 text-uppercase">Edit Review </h2>
              <p class="text-white-50 mb-5">Edit your Reviews!</p>
              

                <form method="POST" action="{{ url('review/' . $review->id)}}" enctype="multipart/form-data" class="h-75">
                @csrf
                @method('put')
              <div class="form-outline form-white mb-4">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name', $review->name) }}" required autocomplete="name" autofocus>

                <label class="name" for="typeEmailX">Name</label>
                
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-outline form-white mb-4">
                <textarea id="description" type="text" class="form-control form-control-lg @error('description') is-invalid @enderror row-12" name="description" required>{{ old('description', $review->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label class="form-label" for="typeEmailX">Description</label>
              </div>
              
              
              <div class="form-outline form-white mb-4">
                <input class="form-control" type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', $review->thumbnail) }}"/>
                <img src="data:image/jpeg;base64,{{ $review->thumbnail }}" class="myHover">
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label for="typeEmailX" style="display:block;">Picture</label>
              </div>
              
              <!--Fallo de seguridad, hay q ver si las imagenes que se intentan borrar son de esta review y despues eliminarlas-->
              <div class="form-outline form-white mb-4">
                <input class="form-control" type="file" name="images[]" id="images" accept="image/jpeg" multiple/>
                <input class="form-control" type="hidden" name="delimages[]" id="delimages" multiple/> 
                <label class="form-label text-danger" for="typeEmailX">DELETE</label>
                @foreach($images as $image)
                <img src="{{ asset('storage/images/' . $image->name) }}" class="myHover myRemove">
                @endforeach
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="typeEmailX"style="display:block;">Images</label>
              </div>


              <div class="form-outline form-white mb-4">
                <select name="type" id="type" class="form-control">
                  <option value="book" <?php if($review->type == 'book') echo 'selected' ?>>Book</option>
                  <option value="record"<?php if($review->type == 'record') echo 'selected' ?>>Record</option>
                  <option value="films"<?php if($review->type == 'films') echo 'selected' ?>>Films</option>
                </select>
                  @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="typeEmailX">Section</label>
              </div>

              


              <button class="btn btn-outline-light btn-lg px-5" type="submit" id="submit">Edit</button>
              
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/myjs.js')}}"></script>

@endsection
