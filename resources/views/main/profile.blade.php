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
        <p>Confirm delete <span id="deletePersona"></span></p>
        <p>With email <span id="deleteEmail"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete User"/>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container rounded mb-5 pt-5" >




<div class="container rounded bg-white mb-5 pt-5" style="height: 800px; display:flex; align-items:center; justify-content:center;">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{ $user->name }}</span>
                <span class="text-black-50">{{ $user->email }}</span>
                <div class="row mt-3">
                    @if(Auth::user()->hasVerifiedEmail())
                        <label class="labels mt-5">VERIFIED</label>
                    @endif
                </div>
                </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ url('user/' . $user->id)}}" method="POST">
                    @csrf
                    @method('put')
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" name="name" value="{{old('name', $user->name) }}" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="enter email" name="email" value="{{old('email', $user->email) }}" required></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    @if(!Auth::user()->hasVerifiedEmail())
                        <label class="labels mt-5">You are not verified, please </label><a href="{{ url('email/verify') }}"> verify </a><label class="labels">your email.</label> 
                    @endif
                </form>
                <div class="d-flex justify-content-around align-items-center experience mt-5 pt-5">
                    <span>Delete User</span>
                    <form action="{{ url('user/' . $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="javascript: void(0);" 
                                   data-name="{{ $user->name }}"
                                   data-email="{{ $user->email }}"
                                   data-url="{{ url('user/' . $user->id) }}"
                                   data-toggle="modal"
                                   data-target="#modalDelete"><button class="btn btn-danger profile-button">Delete</button></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span>Log Out</span>
                    <form action="{{ url('logout') }}" method="get">
                        @csrf
                         <button class="btn btn-primary profile-button" type="submit">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@if($user->reviews)
<div class="container rounded mb-5>
<div class="album py-5 mt-5">
        <div class="container">
          <div class="row">
        @foreach($user->reviews as $review)  
        
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="height: 400px">
                <img class="card-img-top h-50" src="data:image/jpeg;base64,{{ $review->thumbnail }}">
                <div class="card-body">
                  <h4 class="card-text text-dark">{{ $review->name}}</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ url('review/' . $review->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                        <a href="{{ url('review/' . $review->id . '/edit')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                      </div>
                    <h6 class="text-muted">{{ $review->type}}</h6>
                  </div>
                  <h6 class="text-muted mt-3">{{ $review->user->name}}</h6>
                        <a href="javascript: void(0);" 
                                   data-name="{{ $review->name }}"
                                   data-url="{{ url('review/' . $review->id) }}"
                                   data-toggle="modal"
                                   data-target="#modalDelete"><button type="button" class="btn btn-sm btn-danger mt-3">Delete</button></a>
                   <small class="text-muted " style="float:right; line-height:60px">{{ $review->updated_at}}</small>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      </div>
      @endif
@endsection

@section('scripts')
<script src="{{ url('assets/js/user-modal-delete.js') }}"></script>

@endsection


