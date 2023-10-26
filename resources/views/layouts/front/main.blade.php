<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OXYGEN - DEVELOPMENT</title>
    <meta name="description" content="OXYGEN - DEVELOPMENT">
    <meta name="keywords" content="Novas"/>
    <meta name="author" content="Novas"/>
    <meta name="google-site-verification" content=""/>
    <!--=======css Links======-->
    <!--    <link rel="manifest" href="img/favicon/site.webmanifest">-->
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.svg') }}">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/fancybox.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/main.css">
    @yield('style')

    <style>
        html {
            scroll-behavior: smooth
        }
    </style>
</head>
<body>

@if(\Request::segment(1) == '')
    <div class="preloader">
        <div class="preloader__logo">
            <lottie-player src="https://lottie.host/510b2599-f8c5-4860-9c7d-784495e170c3/0Eaxe9TZSS.json" background="transparent" class="anima" speed="1" loop autoplay></lottie-player>
        </div>
    </div>
@endif

@include('components.front.header')
@yield('content')
@include('components.front.popup')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/js/inputmask.min.js"></script>
<script src="/js/fancybox.umd.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/main.js"></script>
@yield('script')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<script>
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [41.237014, 69.213624],
                zoom: 17,
                controls: []
            }),

            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
                iconLayout: 'default#image',
                iconImageHref: '/img/map.svg',
                iconImageSize: [86, 86],
                iconImageOffset: [-55, -58]
            })
        myMap.geoObjects
            .add(myPlacemark)

        myMap.behaviors.disable('scrollZoom')

        myMap.panes.get('ground').getElement().style.filter = 'grayscale(100%)';
    });
</script>
</body>
</html>
