@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/fancybox.css">
@endsection

@section('content')
    <div class="wrapper">
        <section class="section__banner" style="background-image: url(/img/bg/gallery.jpg);">
            <div class="general__container">
                <div class="banner">
                    <div class="banner__container">
                        <h1 class="title general__regular">{{__('asd.OXYGEN - Галерея')}}</h1>
                        <p class="subtitle general__regular">{{__('asd.Галерея')}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__gallery-page">
            <div class="general__container">
                <div class="gallery">
                    <div class="gallery__filter">
                        <div class="gallery__filter-title">
                            <span class="general__regular">{{__('asd.Фильтровать')}}</span>
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="15" r="15" fill="white"/>
                                <path d="M10 13.3333L15 18.3333L20 13.3333" stroke="#009789" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <ul class="list">
                            <li class="@if ($active == 0) active @endif "><a href="/gallery">{{__('asd.All photos')}}</a></li>
                            @foreach ($projects as $project)    
                                <li class=" @if ($active == $project->id) active @endif"><a href="{{route('gallery.show', $project->id)}}">{{__('asd.'.$project->name)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="gallery__container" >
                        <div class="gallery__container-column">
                            @foreach ($galleries as $gallery)
                                <div class="gallery__item" data-aos="flip-left">
                                    @if ($gallery->data != null)
                                        <span class="date general__regular">{{$gallery->data}}</span>
                                    @endif
                                    <div class="pic">
                                        <a class="general__view" href="{{$gallery->photo}}" data-fancybox="gallery"></a>
                                        <img src="{{$gallery->photo}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('components.front.footer')
@endsection

@section('script')
    <script src="/js/fancybox.umd.js"></script>
    <script>
        $(window).on('scroll load', () => {
            ($(window).scrollTop() > 80) ?
                $('.header').addClass('header__dark') :
                $('.header').removeClass('header__dark')
        });

        $(window).on('load', function () {
            if($(window).width() < 900) {
                $('.gallery__filter-title').click(()=>{
                    $('.gallery__filter-title').toggleClass('active');
                    $('.gallery__filter .list').slideToggle('500');
                })
            }
        });

    </script>
@endsection
