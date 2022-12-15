@extends('layouts.app')


@section('content')
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span id="deletePersona"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete review"/>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container rounded mt-5 mb-5 pt-5" >
@if($type)
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{ $type }}</h1>
    </div>
  </div>
@endif

<div class="album py-5 mt-5">
        <div class="container">
          <div class="row">
        @foreach($reviews as $review)  
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="height: 400px">
                <img class="card-img-top h-50" src="data:image/jpeg;base64,{{ $review->thumbnail }}">
                <div class="card-body">
                  <h4 class="card-text text-dark">{{ $review->name}}</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ url('review/' . $review->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                      @if(Auth::user())
                        @if(Auth::user()->id == $review->iduser)
                        <a href="{{ url('review/' . $review->id . '/edit')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                        @endif
                      @endif
                      </div>
                      <h6 class="text-muted">{{ $review->type}}</h6>
                    
                  </div>
                  <h6 class="text-muted mt-3">{{ $review->user->name}}</h6>
                  @if(Auth::user())
                        @if(Auth::user()->id == $review->iduser)
                        <!--<a href="{{ url('review/' . $review->id)}}"><button type="button" class="btn btn-sm btn-danger mt-3">Delete</button></a>-->
                        
                        <a href="javascript: void(0);" 
                                   data-name="{{ $review->name }}"
                                   data-url="{{ url('review/' . $review->id) }}"
                                   data-toggle="modal"
                                   data-target="#modalDelete"><button type="button" class="btn btn-sm btn-danger mt-3">Delete</button></a>
                        @endif
                      @endif
                      <small class="text-muted " style="float:right; line-height:60px">{{ $review->updated_at}}</small>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      </div>
@endsection
@section('scripts')
<script src="{{ url('assets/js/review-modal-delete.js') }}"></script>

@endsection

