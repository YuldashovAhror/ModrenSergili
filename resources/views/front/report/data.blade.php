@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/fancybox.css">
@endsection

@section('content')
    <div class="wrapper">
        <section class="section__banner" style="background-image: url(/img/bg/main.jpg);">
            <div class="general__container">
                <div class="banner">
                    <div class="banner__container">
                        <h1 class="title general__regular">{!!__('asd.OXYGEN-<br>Новости и акции')!!}</h1>
                        <p class="subtitle general__regular">{{__('asd.Новости')}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__news page">
            <div class="general__container">
                <div class="news__filter">
                    <h3 class="title general__regular">{{__('asd.Новости')}}</h3>
                    <div class="filters">
                        {{-- <div class="filters__links">
                            <a href="" class="filters__link general__regular">новости</a>
                            <a href="" class="filters__link general__regular">акции</a>
                        </div> --}}
                        <form class="filters__year" action="">
                            {{-- <select class="general__regular" name="" id="">
                                <option value="">{{__('asd.2022- год')}}</option>
                            </select> --}}
                            <svg width="10" height="8" viewBox="0 0 10 8" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.66675L5 5.66675L9 1.66675" stroke="#009789" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                        </form>
                    </div>
                </div>
                <div class="news">
                    @foreach ($news as $new)
                        <div class="news__item" data-aos="fade-up">
                            <div class="pic">
                                <div class="news__item-types">
                                    @if ($new->type == 2)
                                        <span>{{ __('asd.Новости') }}</span>
                                    @endif
                                    @if ($new->type == 1)
                                        <span>{{ __('asd.Акции') }}</span>
                                    @endif
                                </div>
                                <img @if (!empty($new->photo->img)) src="{{ $new->photo->img }}" @endif>
                                <a class="general__view" href="{{ route('report.show', $new->id) }}"></a>
                            </div>
                            <div class="content">
                                <h4 class="title general__regular">
                                    <a href="{{ route('report.show', $new->id) }}">{{ __('asd.' . $new->title) }}</a>
                                </h4>
                                <div class="subtitle general__book">{!! __('asd.' . $new->description) !!}</div>
                                {{-- <a href="/report-single" class="more">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.5" cy="8.5" r="8.5" transform="rotate(-90 8.5 8.5)"
                                            fill="white" />
                                        <path d="M7.55554 11.3334L10.3889 8.50004L7.55554 5.66671" stroke="#009789"
                                            stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <span class="general__regular">бренд года 2021</span>
                                </a> --}}
                            </div>
                        </div>
                    @endforeach
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
            $('.header').addClass('header__dark'):
                $('.header').removeClass('header__dark')
        });

        $(window).on('load', function() {
            $('.section__news').addClass('')
        });
    </script>
@endsection
