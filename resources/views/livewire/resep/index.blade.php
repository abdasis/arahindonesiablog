<div>
    <div class="jumbotron jumbotron-fluid" style="background: #E0E0E0">
        <div class="container pt-5 pb-3">
            <div class="row">
                <div class="col-md-8 align-self-center" class="middle-content">
                    <h1 class="display-4 font-weight-bolder text-white">Masak Yuk Guys!</h1>
                <p class="lead text-white">Temukan resep makanan paling enak disini guys</p>
                </div>
                <div class="col-md-4">
                    <img src="{{  asset('assets/images/shostudio_grandma-1.gif') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div wire:ignore data-slick='{"slidesToShow": 2, "slidesToScroll": 4}' class="center row">
            @foreach ($recipes['results'] as $recipe)
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="{{ $recipe['thumb'] }}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{ route('resep.show', $recipe['key']) }}">
                            <h4 class="card-title">{{ ucfirst($recipe['title']) }}</h4>
                        </a>
                        <p class="card-text text-center font-14">
                            <span class="time mr-2 badge p-1 badge-outline-blue"><i class="mdi mdi-alarm"></i> {{ $recipe['times'] }}</span>
                            <span class="time mr-2 badge p-1 badge-outline-pink"><i class="mdi mdi-room-service-outline"></i> {{ $recipe['serving'] ?? $recipe['portion'] }}</span>
                            <span class="time mr-2 badge p-1 badge-outline-success"><i class="mdi mdi-book-open"></i> {{ $recipe['difficulty'] ?? $recipe['dificulty'] }}</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <section class="mt-5">
            <div class="text-center">
                <h3>Cari Resep : {{ $key }}</h3>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg rounded-lg" wire:model='key'>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="text-center mb-3">Resep Terbaru</h2>
            <div class="row">
                @if ($recipes['results'])
                @foreach ($recipes['results'] as $recipe)
                <div class="col-md-3">
                    <div class="card shadow-md">
                        <img class="card-img-top" src="{{ $recipe['thumb'] }}" alt="Card image cap">
                        <div class="card-body">
                            <a href="{{ route('resep.show', $recipe['key']) }}">
                                <h4 class="card-title">{{ ucfirst($recipe['title']) }}</h4>
                            </a>
                            <p class="card-text text-center font-14 row justify-content-center">
                                <span class="time mr-2 badge p-1 mb-1 badge-outline-blue"><i class="mdi mdi-alarm"></i> {{ $recipe['times'] }}</span>
                                <span class="time mr-2 badge p-1 mb-1 badge-outline-pink"><i class="mdi mdi-room-service-outline"></i> {{ $recipe['serving'] ?? $recipe['portion'] }}</span>
                                <span class="time mr-2 badge p-1 mb-1 badge-outline-success"><i class="mdi mdi-book-open"></i> {{ $recipe['difficulty'] ?? $recipe['dificulty'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="container">
                    <div class="alert bg-soft-danger">
                        <h1 class="text-center text-danger">Resep Yang Anda Cari Tidak Di temukan</h1>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </div>
</div>

@section('js')
    <script>
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1,
                        slidesToScroll: 1

                    }
                },
            ]
        });
    </script>
@endsection
