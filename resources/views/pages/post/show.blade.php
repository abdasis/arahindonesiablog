@extends('layouts.app')
@section('meta_description')
<meta property="og:title" content="{{ strip_tags($post->judul_artikel) }}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="@yield('{{ Str::limit(strip_tags($post->isi_artikel), 160, '.') }}')" />
<meta property="og:image" content="{{ asset('thumbnail-artikel/') .'/'.$post->thumbnail_artikel }}" />
<meta property="og:url" content="{{ strip_tags(url('/') . '/' . $post->slug) }}" />
<meta property="og:site_name" content="The Journey To a Greate Programmer"/>
<meta content="{{ Str::limit(strip_tags($post->isi_artikel), 160, '.') }}" name="description" />
<meta content="Abd. Asis" name="author" />
@endsection
@section('title')
{{ strip_tags($post->judul_artikel) }}
@endsection
@section('content')
<section class="artikel">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3 col-sm-12">
                <div class="card mb-2 shadow-md">
                    <div class="card-body pt-3 pb-0" style="border-bottom: 1px dashed #eee">
                        <h1 class="card-title mb-0 font-28">{{ $post->judul_artikel }} @auth <a href="{{ route('posts.edit', $post->slug) }}"><i class="mdi mdi-pencil-circle"></i></a> @endauth</h1>
                        <p class="font-14 font-weight-bolder mt-1">
                            <span class="text-danger font-14 badge badge-soft-danger p-1"><i class="mdi mdi-tag mr-1"></i>{{ $post->kategori_artikel ?? 'Catatan' }}</span>
                            <span class="text-blue font-14 badge badge-soft-blue p-1"><i class="mdi mdi-calendar mr-1"></i>{{ date('d-m-Y', strtotime($post->created_at)) }}</span>
                            <span class="text-success font-14 badge badge-soft-success p-1"><i class="mdi mdi-account-circle mr-1"></i>Abd. Asis</span>
                            <span class="text-danger font-14 badge badge-soft-danger p-1"><i class="mdi mdi-fire mr-1"></i>{{ $totalCount }} Dilihat</span>
                        </p>
                    </div>

                    @if ($post->thumbnail_artikel  && file_exists(public_path('thumbnail-artikel') . '/' . $post->thumbnail_artikel))
                    <img class="card-img-top img-post-thumbnail" src="{{ asset('thumbnail-artikel/') .'/'.$post->thumbnail_artikel }}" alt="Card image cap">
                    @else
                    <img class="card-img-top img-post-thumbnail" src="{{ asset('assets/images/patient_forms_drib.jpg') }}" alt="Card image cap">
                    @endif

                    <img src="{{ asset('/assets/images/asis.jpeg') }}" alt="" class="img-profil align-self-center rounded-circle">

                    <div class="card-body">
                        <div class="card-text">
                            <div class="content-artikel" style="font-size: 17px">
                                {!! $post->isi_artikel !!}
                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <h4 class="text-center">Jika dirasa artikel ini bermanfaat yuk bagikan ke temanmu!</h4>
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
@endsection

@section('js')

@endsection
