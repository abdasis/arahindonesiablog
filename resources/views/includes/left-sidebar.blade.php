<div class="col-md-4 col-sm-12">
    <div class="card mt-3 shadow-md">
        <img src="{{ asset('/assets/images/asis.jpeg') }}" alt="" class="img-profil align-self-center rounded-circle">
        <div class="card-title text-center pb-0">
            <h3 class="mb-0">Abd. Asis <span class="text-blue"><i class="mdi mdi-check-circle"></i></span></h3>
            <p class="text-muted">Tukang Ketik</p>
        </div>
        <div class="card-body pt-0">
            <h4 class="text-black-50">Tentang</h4>
            <p class="font-14 font-weight-semibold">
                Pecinta Jendela, Tapi Pelihara Pinguin, Ingin Punya Apple Tapi Tidak Kuat Beli.
                <a href="https://www.facebook.com/abdasispif">Selengkapnya...</a>
            </p>
        </div>
    </div>

    <div class="card shadow-md" >
        <h5 class=" bg-white border-bottom card-header font-weight-bolder "><i class="mdi mdi-chart-areaspline mr-1"></i>ARTIKEL TERBARU</h5>
        <div class="card-body">
            <div class="card-text">
                @foreach (App\Models\Post::latest()->get() as $key => $post)
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <div class="row pl-3 rounded-pill middle-content" style="border-bottom: 1px dashed #eee">
                            <h3 class="nama-group">{{ $post->judul_artikel }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
