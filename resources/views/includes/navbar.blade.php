

<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
    <div class="container-fluid">
        <!-- LOGO -->
        <a class="logo text-uppercase" href="{{ url('/') }}">
            {{--  <img src="{{ url('/') }}/assets/images/logo-dark.png" alt="" class="logo-light" height="20" />
            <img src="{{ url('/') }}/assets/images/logo-dark.png" alt="" class="logo-dark" height="20" />  --}}
            <h4 class="text-dark font-weight-bolder font-weight-bolder text-blue">ABD ASIS</h4>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form action="{{ route('beranda') }}" method="get">
                <input type="text" name="pencarian" class="form-control-lg mx-4 w-70 rounded-pill form-header" value="{{ Session::get('pencarian') }}"  placeholder="Masukan pencarian">
            </form>
            <ul class="navbar-nav ml-auto" id="mySidenav">
                <li class="nav-item">
                    <b><a href="{{ url('/') }}" class="nav-link">Beranda</a></b>
                </li>

                <li class="nav-item">
                    <b><a href="#" class="nav-link">Profile</a></b>
                </li>

                <li class="nav-item">
                    <b><a href="{{ route('resep.index') }}" class="nav-link">Resep Makanan  <sup><span class="badge badge-danger">HOT</span></sup></a></b>
                </li>
            </ul>

        </div>
    </div>
</nav>
