<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" href="{{ route('create.show') }}">Add</a></li>
                @if(Auth::user()->verified == 1)
                    <li class="nav-item"><a class="nav-link active" href="{{ route('completed') }}">Completed</a></li>
                @else
                    <li class="nav-item"><a class="nav-link disabled" href="#">Completed</a></li>
                @endif
                <li class="nav-item"><a class="ms-5 nav-link active" href="{{ route('bin') }}">Recycle Bin</a></li>
                <li class="nav-item"><a class="ms-5 nav-link" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
