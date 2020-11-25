<div>
    <section class="artikel">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-3 col-sm-12">
                    <div class="card mb-2 shadow-md">
                        <div class="card-body pt-3 pb-0" style="border-bottom: 1px dashed #eee">
                            <h1 class="card-title mb-0 font-28">{{ $recipe['title'] }}</h1>
                            <p class="font-14 font-weight-bolder mt-1 text-center">
                                <span class="time mr-2 badge p-1 badge-outline-blue"><i class="mdi mdi-alarm"></i> {{ $recipe['times'] }}</span>
                                <span class="time mr-2 badge p-1 badge-outline-pink"><i class="mdi mdi-room-service"></i> {{ $recipe['servings'] }}</span>
                                <span class="time mr-2 badge p-1 badge-outline-success"><i class="mdi mdi-book-open"></i> {{ $recipe['dificulty'] }}</span>
                                <span class="time mr-2 badge p-1 badge-outline-warning"><i class="mdi mdi-account-circle"></i>{{ $recipe['author']['user'] }}</span>
                                <span class="time mr-2 badge p-1 badge-outline-danger"><i class="mdi mdi-calendar"></i>{{ $recipe['author']['datePublished'] }}</span>

                            </p>
                        </div>


                        <img class="card-img-top img-post-thumbnail" src="{{ $recipe['thumb'] }}" alt="Card image cap">


                        <img src="{{ asset('/assets/images/asis.jpeg') }}" alt="" class="img-profil align-self-center rounded-circle">


                        <div class="card-body">
                            <div class="card-text">
                                <div class="content-artikel" style="font-size: 17px">
                                    {!! $recipe['desc'] !!}
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h4 class="text-center">Bahan Dibutuhkan</h4>
                            <div class="row justify-content-center">
                                @foreach ($recipe['needItem'] as $needItem)
                                <div class="col-md-4">
                                    <div class="card bg-light p-2">
                                        <img class="card-img-top w-50 mx-auto d-block" src="{{ $needItem['thumb_item'] }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">{{ ucfirst($needItem['item_name']) }}</h4>
                                        </div>
                                        <a target="_blank" href="https://www.tokopedia.com/search?st=product&q={{ $needItem['item_name'] }}">
                                            <button class="btn btn-danger btn-block"><i class="mdi mdi-cart-outline"></i> Beli Sekarang</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-center shadow-none border p-2">
                                        <h1><i class="mdi mdi-alarm"></i></h1>
                                        <p class="p-0">Waktu Memasak</p>
                                        {{ $recipe['times'] }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center shadow-none border p-2">
                                        <h1><i class="mdi mdi-room-service"></i></h1>
                                        <p class="p-0">Jumlah Porsi</p>
                                        {{ $recipe['servings'] }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center shadow-none border p-2">
                                        <h1><i class="mdi mdi-chef-hat"></i></h1>
                                        <p class="p-0">Nama Chef</p>
                                        {{ $recipe['author']['user'] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow-none">
                                        <h4 class="card-header bg-white border-bottom">Komposisi</h4>
                                        <div class="card-body">
                                            <ol>
                                                @foreach ($recipe['ingredient'] as $item)
                                                    <li><p>{{ $item }}</p></li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow-none">
                                        <h4 class="card-header bg-white border-bottom">Langkah Memasak</h4>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                @foreach ($recipe['step'] as $item)
                                                    <li>
                                                        <p>{{ $item }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <p>Selamat mencobat teman-teman semoga enak yaa rasanya</p>
                        </div>


                        <div class="card-body">
                            <h4 class="text-center">Jika Dirasa Resep Ini Bermanfaat Buat Kamu Jangan Lupa Share Ya!</h4>
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div>
                                <!-- ShareThis END -->
                        </div>
                    </div>

                    <div class="card shadow-md">
                        <div class="card-body">
                            <h3 class="font-22"><i class="mdi mdi-comment mr-1"></i>Berikan Komentar</h3>
                            <div class="alert alert-success">Berkomentarlah dengan kata-kata yang baik</div>
                            <div id="disqus_thread"></div>
                            <script>

                            /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://abd-asis-3.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>

                </div>
                @include('includes.left-sidebar')

            </div>
        </div>
    </section>
</div>


@section('title')
{{ $recipe['title'] }}
@endsection
