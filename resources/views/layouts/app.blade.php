<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Abd. Asis</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('meta_description')
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css" type="text/css">
        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="css/prism.css">
        @yield('css')
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
                <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        @livewireStyles
        <style>
            *{
                font-family: 'Nunito', sans-serif;
            }

            h3{
                font-family: 'Acme', sans-serif !important;
            }

            .img-post-thumbnail-small {
                height: 256px !important;
                width: 100% !important;
                object-fit: cover;
                object-position: center;
            }

            .img-post-thumbnail {
                height: 360px;
                width: 100%;
                object-fit: cover;
                object-position: center;
            }


        </style>
        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/jquery.scrollbar.css" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172404660-2"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172404660-3"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-172404660-3');
        </script>
    </head>

    <body>

        <!--Navbar Start-->
        @include('includes.navbar')

        @yield('content')

        <!-- Navbar End -->


        <!-- footer start -->
        @include('includes.footer')
        <!-- footer end -->
        <!-- Back to top -->
        <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>

        <!-- javascript -->
        @livewireScripts
        <script src="{{ url('/') }}/assets/js/jquery.min.js"></script>
        <script src="{{ url('/') }}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.easing.min.js"></script>
        <script src="{{ url('/') }}/assets/js/scrollspy.min.js"></script>
        <!-- custom js -->
        <script src="{{ url('/') }}/assets/js/app.js"></script>
        <script src="{{ url('/') }}/js/jquery.scrollbar.min.js"></script>
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2a9f204211fc0012520e87&product=sop' async='async'></script>
        <script>
        jQuery(document).ready(function(){
            jQuery('.scrollbar-dynamic').scrollbar();

        });
        </script>
        <script src="{{ asset('js/prism.js') }}"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        @yield('js')
        @stack('js')

    </body>

</html>
