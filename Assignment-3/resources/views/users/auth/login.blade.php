@extends('Layout.userLayout')

@section('title', 'Task Manager')

@section('content')

@if (session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
@endif

<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form class="mx-1 mx-md-4" action="{{ route('login') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" />
                      <label class="form-label" for="form3Example1c">Username</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mt-4 mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-dark btn-lg">Login</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img id="myImage" src="https://i.kym-cdn.com/photos/images/newsfeed/001/931/955/181.jpg" class="img-fluid ms-5" alt="Sample image" height="370" width="370">
              </div>
            </div>
          </div>
        </div>
        <a type="button" class="btn btn-link ms-auto" href="{{ route('register.show') }}">Dont have an account? Click me!</a>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')
    <script>
        let isFirstImage = true;
        document.getElementById("myImage").addEventListener("click", function() {
            if (isFirstImage) {
                document.getElementById("myImage").src = "https://i.kym-cdn.com/photos/images/newsfeed/001/931/955/181.jpg";
                isFirstImage = false;
            } else {
                document.getElementById("myImage").src = "https://e0.pxfuel.com/wallpapers/906/85/desktop-wallpaper-wide-mouth-singing-cat-pop-cat-pop-cat-cat-memes-cat-profile-popcat.jpg";
                isFirstImage = true;
            }
        });
    </script>
@endpush