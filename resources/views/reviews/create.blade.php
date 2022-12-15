@extends('layouts.app')


@section('content')
<div class="py-5" style="height: 1100px">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body px-5 text-center">

            <div class="mb-md-5 mt-md-4">

              <h2 class="fw-bold mb-2 text-uppercase">Create Review</h2>
              <p class="text-white-50 mb-5">Share your Reviews!</p>
              

                <form method="POST" action="{{ url('/review') }}" enctype="multipart/form-data" class="h-75">
                @csrf
              <div class="form-outline form-white mb-4">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                <label class="name" for="typeEmailX">Name</label>
                
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-outline form-white mb-4">
                <textarea id="description" type="text" class="form-control form-control-lg @error('description') is-invalid @enderror row-12" name="description" value="{{ old('description') }}" required></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label class="form-label" for="typeEmailX">Description</label>
              </div>
              
              
              <div class="form-outline form-white mb-4">
                <input class="form-control" type="file" name="thumbnail" id="thumbnail"/>
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="typeEmailX">Picture</label>
              </div>
              
              
              <div class="form-outline form-white mb-4">
                <input class="form-control" type="file" name="images[]" id="images" multiple/>
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="typeEmailX">Images</label>
              </div>
              
              
              <div class="form-outline form-white mb-4">
                <select name="type" id="type" class="form-control">
                  <option value="book">Book</option>
                  <option value="record">Record</option>
                  <option value="films">Films</option>
                </select>
                  @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="typeEmailX">Section</label>
              </div>

              


              <button class="btn btn-outline-light btn-lg px-5" type="submit">Publish</button>
              
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
