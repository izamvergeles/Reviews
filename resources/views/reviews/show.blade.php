@extends('layouts.app')


@section('content')
 
 <main class="mt-4 mb-5">
    <div class="container mt-4">
      <!--Grid row-->
      <div class="row justify-content-center">
        <!--Grid column-->
        <div class="col-md-8 mb-4 mt-4">
          <!--Section: Post data-mdb-->
          <section class="border-bottom mb-4 mt-5">
            <img src="data:image/jpeg;base64,{{ $review->thumbnail }}"
              class="img-fluid shadow-2-strong rounded-5 mb-4" alt="" style="max-height: 500px;"/>

            
          </section>
          <!--Section: Post data-mdb-->

          <!--Section: Text-->
          <section class="border-bottom mb-4">
                  <p><strong>{{ $review->name }}</strong></p>
            <p>{{ $review->description }}</p>
            @foreach($images as $image)
              <img src="{{ asset('storage/images/' . $image->name) }}"class="img-fluid shadow-1-strong rounded-5 mb-4"alt="" />
              <!--<img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="img-fluid shadow-1-strong rounded-5 mb-4"alt="" />-->
            @endforeach
            @if(Auth::user()->id == $review->iduser)
              <div class="d-flex justify-content-center my-2"style=" width: 100%;">
                <a href="{{ url('review/' . $review->id . '/edit')}}">
                  <button type="submit" class="btn btn-primary" >
                    Edit Post
                  </button>
                </a>
              </div>
              @endif
          </section>
          <!--Section: Text-->

          

          <!--Section: Author-->
          <section class="border-bottom mb-4 pb-4">
            <div class="row">
              <div class="col-3">
                <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                  class="img-fluid shadow-1-strong rounded-5" alt="" />
              </div>
              

              <div class="col-9" >
                <h3 style="line-height:170px;"><strong>{{ $review->user->name }}</strong></h3>
                
              </div>
              
                
            </div>
          </section>
          <!--Section: Author-->

          <!--Section: Comments-->
          <!--<section class="border-bottom mb-3">-->
          <!--  <p class="text-center"><strong>Comments: 3</strong></p>-->

            <!-- Comment -->
          <!--  <div class="row mb-4">-->
          <!--    <div class="col-2">-->
          <!--      <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"-->
          <!--        class="img-fluid shadow-1-strong rounded-5" alt="" />-->
          <!--    </div>-->

          <!--    <div class="col-10">-->
          <!--      <p class="mb-2"><strong>Marta Dolores</strong></p>-->
          <!--      <p>-->
          <!--        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio est ab iure-->
          <!--        inventore dolorum consectetur? Molestiae aperiam atque quasi consequatur aut?-->
          <!--        Repellendus alias dolor ad nam, soluta distinctio quis accusantium!-->
          <!--      </p>-->
          <!--    </div>-->
          <!--  </div>-->

          <!--Section: Reply-->
          <!--<section>-->
          <!--  <p class="text-center"><strong>Leave a reply</strong></p>-->

          <!--  <form>-->
              <!-- Name input -->
          <!--    <div class="form-outline mb-4">-->
          <!--      <input type="text" id="form4Example1" class="form-control" />-->
          <!--      <label class="form-label" for="form4Example1">Name</label>-->
          <!--    </div>-->

              <!-- Email input -->
          <!--    <div class="form-outline mb-4">-->
          <!--      <input type="email" id="form4Example2" class="form-control" />-->
          <!--      <label class="form-label" for="form4Example2">Email address</label>-->
          <!--    </div>-->

              <!-- Message input -->
          <!--    <div class="form-outline mb-4">-->
          <!--      <textarea class="form-control" id="form4Example3" rows="4"></textarea>-->
          <!--      <label class="form-label" for="form4Example3">Text</label>-->
          <!--    </div>-->

             

              <!-- Submit button -->
          <!--    <button type="submit" class="btn btn-primary btn-block mb-4">-->
          <!--      Publish-->
          <!--    </button>-->
          <!--  </form>-->
          <!--</section>-->
          <!--Section: Reply-->
        </div>
        <!--Grid column-->
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </main>

@endsection

