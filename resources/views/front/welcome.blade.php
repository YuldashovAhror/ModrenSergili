@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/fancybox.css">
    <style>
        .projects__item {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="wrapper">
        <section class="section__main">
            <div class="swiper-container main__carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="main__carousel-frame" data-swiper-parallax-opacity="0">
                            <div class="main__carousel-photo" data-swiper-parallax="-100" data-swiper-parallax-scale="1.2">
                                <img src="/img/bg/main.jpg" alt="photo">
                            </div>
                            <div class="main__carousel-caption" data-swiper-parallax="0" data-swiper-parallax-opacity="0">
                                <div class="main__carousel-title general__regular" data-swiper-parallax-y="-200"
                                    data-swiper-parallax-scale=".8">
                                    {{ __('asd.OXYGEN DEVELOPMENT') }}
                                </div>
                                <div class="main__carousel-descr">
                                    <div class="main__carousel-description" data-swiper-parallax="200">
                                        <span class="general__book">{{ __('asd.Ключ к счастливой жизни!') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="main__carousel-frame" data-swiper-parallax-opacity="0">
                            <div class="main__carousel-photo" data-swiper-parallax="-100" data-swiper-parallax-scale="1.2">
                                <img src="/img/bg/single.jpg" alt="photo">
                            </div>
                            <div class="main__carousel-caption" data-swiper-parallax="0" data-swiper-parallax-opacity="0">
                                <div class="main__carousel-title general__regular" data-swiper-parallax-y="-200"
                                    data-swiper-parallax-scale=".8">
                                    {{ __('asd.Modern sergle') }}
                                </div>
                                <div class="main__carousel-descr">
                                    <div class="main__carousel-description" data-swiper-parallax="200">
                                        <span class="general__book">{{ __('asd.Ключ к счастливой жизни!') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main__carousel-navigation general__container">
                    <a href="/#section__scroll" class="main__bottom">
                        <span class="general__book">{{ __('asd.Прокрутить вниз') }}</span>
                        <svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 4L5 8L9 4" stroke="white" />
                            <path d="M1 1L5 5L9 1" stroke="white" />
                        </svg>
                    </a>
                    <div class="main__carousel-nav">
                        <div class="main__carousel-btn main__carousel-prev">
                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1L2 8L11 15" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="main__carousel-btn main__carousel-next">
                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L10 8L1 15" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__filter" id="section__scroll">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">
                        Подбор
                        <span>квартиры</span>
                    </h2>
                </div>
                <form class="filters">
                    <div class="filters__container">
                        <div class="filters__item" data-aos="zoom-in">
                            <div class="filters__box">
                                <select class="general__regular" name="" id="">
                                    <option value="">Жилое помещение</option>
                                    <option value="">Коммерческое помещение</option>
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5" />
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__box">
                                <select class="general__regular" name="" id="">
                                    <option value="">Количество комнат</option>
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5" />
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__box">
                                <select class="general__regular" name="" id="">
                                    <option value="">Локация</option>
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5" />
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__count">
                                <div class="filters__count-number ">
                                    <h4 class="general__regular">Площадь до <span id="filters__square-count"
                                            class="count__range"></span> м2</h4>
                                </div>
                                <div class="filters__count-range">
                                    <input id="filters__square" class="filters__range" type="range" value="0"
                                        min="0" max="378">
                                </div>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__count">
                                <div class="filters__count-number">
                                    <p class="general__book">Стоимость квартиры</p>
                                    <h4 class="general__regular">до <span id="filters__price-count"
                                            class="count__range"></span> сум</h4>
                                </div>
                                <div class="filters__count-range">
                                    <input id="filters__price" class="filters__range" type="range" value="0"
                                        min="0" max="378">
                                </div>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__years">
                                <p class="title">Дата заселения</p>
                                <div class="years">
                                    <div class="years__btn">
                                        <label for="2018" class="year">
                                            2018
                                        </label>
                                        <input type="checkbox" name="" id="2018">
                                    </div>
                                    <div class="years__btn">
                                        <label for="2019" class="year">
                                            2019
                                        </label>
                                        <input type="checkbox" name="" id="2019">
                                    </div>
                                    <div class="years__btn">
                                        <label for="2020" class="year">
                                            2020
                                        </label>
                                        <input type="checkbox" name="" id="2020">
                                    </div>
                                    <div class="years__btn">
                                        <label for="2021" class="year">
                                            2021
                                        </label>
                                        <input type="checkbox" name="" id="2021">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__buttons">
                                <button class="filters__reset" type="reset">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.9118 4.50348C11.929 2.42964 9.78462 1 7.30627 1C3.82341 1 1 3.82341 1 7.30627C1 10.7891 3.82341 13.6125 7.30627 13.6125C10.7891 13.6125 13.6125 10.7891 13.6125 7.30627M13.6125 1V5.20418H9.40836"
                                            stroke="#031530" stroke-width="1.5" />
                                    </svg>
                                    <span class="general__regular">Сбросить</span>
                                </button>
                                <button class="filters__submit general__regular" type="submit">
                                    Показать
                                    <span class="count general__medium">488</span>
                                    квартир
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="section__projects">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right"> Все <span>проекты</span> </h2>
                    <a href="/projects" class="general__top-link" data-aos="fade-left">Все проекты</a>
                </div>
                <div class="projects projects__main">
                    @foreach ($projects as $project)
                        <div class="projects__item" data-aos="fade-up"
                            onclick="location.href='{{ route('projects.show', $project) }}'">
                            <div class="pic">
                                <span class="start general__regular">{{ $project->wordStatus->word_ru }}</span>
                                <img src="{{ $project->imgMain->img }}" alt="">
                            </div>
                            <div class="content">
                                <a href="{{ route('projects.show', $project) }}"
                                    class="title general__regular">{{ $project->wordName->word_ru }}</a>
                                {{--                                <div class="subtitle general__book">labore et dolore</div> --}}
                                <ul class="features">
                                    <li class="features__item general__regular">
                                        <span>{{ $project->wordLocation->word_ru }}</span>
                                    </li>
                                    {{--                                    <li class="features__item general__regular"> --}}
                                    {{--                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                            <path d="M0.865522 4.33922L1.82995 1.44594C2.11829 0.580913 2.9241 0 3.83565 0H10.2638C11.1753 0 11.9811 0.580913 12.2695 1.44594L13.2339 4.33922C13.7422 4.55213 14.0996 5.05408 14.0996 5.63993V9.16488C14.0996 9.68516 13.8148 10.1349 13.3946 10.3796V11.2072V11.9848C13.3946 12.3747 13.0795 12.6898 12.6896 12.6898H11.9846C11.5948 12.6898 11.2796 12.3747 11.2796 11.9848V10.5749H2.81976V11.9848C2.81976 12.3747 2.50463 12.6898 2.11477 12.6898H1.40977C1.01991 12.6898 0.704784 12.3747 0.704784 11.9848V10.3796C0.28461 10.1349 -0.000206947 9.68587 -0.000206947 9.16488V5.63993C-0.000206947 5.05408 0.357224 4.55213 0.865522 4.33922ZM10.2638 1.40998H3.83635C3.5325 1.40998 3.2632 1.60315 3.16732 1.8922L2.3876 4.22994H2.94736H11.152H11.7118L10.9328 1.8922C10.8362 1.60315 10.5669 1.40998 10.2638 1.40998ZM11.6321 8.45989C12.2159 8.45989 12.6896 7.98614 12.6896 7.4024C12.6896 6.81867 12.2159 6.34492 11.6321 6.34492C11.0484 6.34492 10.5747 6.81867 10.5747 7.4024C10.5747 7.98614 11.0484 8.45989 11.6321 8.45989ZM2.46726 8.45989C3.05099 8.45989 3.52475 7.98614 3.52475 7.4024C3.52475 6.81867 3.05099 6.34492 2.46726 6.34492C1.88353 6.34492 1.40977 6.81867 1.40977 7.4024C1.40977 7.98614 1.88353 8.45989 2.46726 8.45989Z" fill="#707070"/> --}}
                                    {{--                                        </svg> --}}
                                    {{--                                        <span>35min</span> --}}
                                    {{--                                    </li> --}}
                                </ul>
                                <div class="content__bottom">
                                    {{-- <p class="amount general__regular">15 квартир</p> --}}
                                    <h6 class="price general__book">от {{ $project->price_from }} {{ __('asd.млн') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section__feedback">
            <div class="general__container">
                <div class="feedback">
                    <div class="feedback__column" data-aos="fade-right">
                        <h2 class="feedback__title general__regular">
                            {{ __('asd.Получить консультацию специалиста') }}
                        </h2>
                        <p class="feedback__subtitle">{{ __('asd.Закажите в один клик обратный звонок!') }}</p>
                        <form action="" class="feedback__form">
                            <div class="block">
                                <span class="general__book">{{ __('asd.Ваше имя') }}</span>
                                <input class="general__regular" name="name" type="text" required>
                            </div>
                            <div class="block">
                                <span class="general__book">{{ __('asd.Номер телефона') }}</span>
                                <input name="_token" value="{{ csrf_token() }}" type="hidden" required>
                                <input class="general__regular" name="phone" type="tel" placeholder=""
                                    maxlength="19" pattern="^[0-9-+\s()]*$">
                            </div>
                            <button class="submits general__regular" 
                                type="submit">{{ __('asd.Отправить заявку') }}</button>
                        </form>
                    </div>
                    <div class="feedback__column" data-aos="fade-left">
                        <img src="/img/bg/feedback.png" class="feedback__bg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="section__about">
            <div class="general__container">
                <div class="about">
                    <div class="about__columns">
                        <div class="pic anima-blocks">
                            <a class="general__view" href=""></a>
                            <img src="{{ $about->photo }}" alt="">
                        </div>
                        <div class="box">
                            <div class="pic anima-blocks">
                                <a class="general__view" href=""></a>
                                <img src="{{ $about->second_photo }}" alt="">
                            </div>
                            <div class="more">
                                <a href="/about" class="more__link" data-aos="zoom-in">
                                    <span class="general__regular">{{ __('asd.Подробнее') }}</span>
                                </a>
                                <svg class="more__icon" width="51" height="70" viewBox="0 0 51 70"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M50.1758 69.038H20.9701L50.1758 42.2586V69.038ZM41.4064 44.166L14.4884 69.038H0L33.3234 36.5366C35.0255 35.1369 36.4143 33.3948 37.3996 31.4232C38.3849 29.4516 38.9447 27.2946 39.0425 25.0924C39.1847 23.167 38.9284 21.233 38.2896 19.4112C37.6508 17.5894 36.6433 15.919 35.3301 14.5044C34.0168 13.0898 32.4261 11.9615 30.6572 11.1899C28.8883 10.4184 26.9793 10.0202 25.0497 10.0202C23.12 10.0202 21.2111 10.4184 19.4423 11.1899C17.6734 11.9615 16.0827 13.0898 14.7694 14.5044C13.4562 15.919 12.4487 17.5894 11.8099 19.4112C11.1711 21.233 10.9148 23.167 11.0569 25.0924H0C0.00140722 20.8829 1.06087 16.7414 3.08099 13.0489C5.10112 9.35632 8.01699 6.23146 11.5603 3.96167C15.1036 1.69187 19.1605 0.35002 23.3578 0.0597499C27.5552 -0.23052 31.7581 0.540079 35.5799 2.30053C39.4016 4.06099 42.7194 6.75481 45.2281 10.1342C47.7368 13.5135 49.3557 17.4698 49.936 21.6391C50.5162 25.8083 50.0392 30.0567 48.5487 33.9932C47.0582 37.9297 44.6021 41.4279 41.4064 44.166Z"
                                        fill="#031530" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="about__columns" data-aos="fade-left">
                        <h2 class="title general__regular">{{ __('asd.О нашей компании') }}</h2>
                        <div class="subtitle general__light">
                            {!! $about['description_' . $lang] !!}
                        </div>
                    </div>
                </div>
                <div class="about__carousel swiper" data-aos="fade-left">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="about__item">
                                <div class="top">
                                    <h3 class="number general__light">{{ __('asd.575k') }}</h3>
                                    <p class="general__regular">{{ __('asd.метр2') }}</p>
                                </div>
                                <img src="/img/about/i-1.svg" alt="" class="icon">
                                <p class="name general__regular">{{ __('asd.Lorem ipsum') }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="about__item">
                                <div class="top">
                                    <h3 class="number general__light">{{ __('asd.17') }}</h3>
                                    <p class="general__regular">{{ __('asd.проектов') }}</p>
                                </div>
                                <img src="/img/about/i-2.svg" alt="" class="icon">
                                <p class="name general__regular">{{ __('asd.в портфолио') }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="about__item">
                                <div class="top">
                                    <h3 class="number general__light">{{ __('asd.17') }}</h3>
                                    <p class="general__regular">{{ __('asd.проектов') }}</p>
                                </div>
                                <img src="/img/about/i-2.svg" alt="" class="icon">
                                <p class="name general__regular">{{ __('asd.в портфолио') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__news">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">{!! __('asd.Новости и <span>акции</span>') !!}</h2>
                    <a href="/report" class="general__top-link" data-aos="fade-left">{{ __('asd.Все Новосоть') }}</a>
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
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.5" cy="8.5" r="8.5" transform="rotate(-90 8.5 8.5)" fill="white"/>
                                        <path d="M7.55554 11.3334L10.3889 8.50004L7.55554 5.66671" stroke="#009789" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <span class="general__regular">бренд года 2021</span>
                                </a> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section__gallery">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">
                        {!! __('asd.Галерея <span>фото</span>') !!}
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#F5F5F5" />
                            <path d="M10 13.3333L15 18.3333L20 13.3333" stroke="#009789" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </h2>
                    <a href="/gallery" class="general__top-link" data-aos="fade-left">{{ __('asd.Все Галерея') }}</a>
                </div>
                <div class="gallery__main">
                    @if ($gallery[0]!= null)
                        <div class="gallery__item gallery__item-high" data-aos="flip-left">
                            <span class="date general__regular">{{ $gallery[0]->data }}</span>
                            <div class="pic">
                                <a class="general__view" href="{{ $gallery[0]->photo }}" data-fancybox="gallery"></a>
                                <img src="{{ $gallery[0]->photo }}" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="gallery__grid">
                        <div class="gallery__row">
                            @if ($gallery[1]->data && $gallery[1]->photo != null)
                                <div class="gallery__item" data-aos="flip-left">
                                    <span class="date general__regular">{{ $gallery[1]->data }}</span>
                                    <div class="pic">
                                        <a class="general__view" href="{{ $gallery[1]->photo }}"
                                            data-fancybox="gallery"></a>
                                        <img src="{{ $gallery[1]->photo }}" alt="">
                                    </div>
                                </div>
                            @endif
                            @if ($gallery[2]->data && $gallery[2]->photo != null)
                                <div class="gallery__item" data-aos="flip-left">
                                    <span class="date general__regular">{{ $gallery[2]->data }}</span>
                                    <div class="pic">
                                        <a class="general__view" href="{{ $gallery[2]->photo }}"
                                            data-fancybox="gallery"></a>
                                        <img src="{{ $gallery[2]->photo }}" alt="">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="gallery__row">
                            @if (isset($gallery[3]))
                                <div class="gallery__item" data-aos="flip-left">
                                    <span class="date general__regular">{{$gallery[3]->data}}</span>
                                    <div class="pic">
                                        <a class="general__view" href="{{$gallery[3]->photo}}" data-fancybox="gallery"></a>
                                        <img src="{{$gallery[3]->photo}}" alt="">
                                    </div>
                                </div>
                            @endif 
                            @if (isset($gallery[4]))   
                                <div class="gallery__item" data-aos="flip-left">
                                    <span class="date general__regular">{{$gallery[4]->data}}</span>
                                    <div class="pic">
                                        <a class="general__view" href="{{$gallery[4]->photo}}" data-fancybox="gallery"></a>
                                        <img src="{{$gallery[4]->photo}}" alt="">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('components.front.footer')
@endsection

@section('script')
    <script src="/js/swiper.min.js"></script>
    <script src="/js/fancybox.umd.js"></script>

    <script>
        $(window).on('scroll load', () => {
            ($(window).scrollTop() > 80) ?
            $('.header').addClass('header__dark'):
                $('.header').removeClass('header__dark')
        });

        let swiperMain = new Swiper('.main__carousel', {
            slidesPerView: 1,
            speed: 800,
            parallax: true,
            loop: true,
            effect: 'fade',
            pagination: false,
            autoplay: {
                delay: 2000,
            },
            navigation: {
                prevEl: '.main__carousel-prev',
                nextEl: '.main__carousel-next',
            },
        });

        let swiperAbout = new Swiper(".about__carousel", {
            slidesPerView: "auto",
            centeredSlides: true,
            // slidesPerView: 3,
            spaceBetween: 60,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
        });

        let rangeSquare = document.getElementById("filters__square");
        let rangeSquareCount = document.getElementById("filters__square-count");

        rangeSquare.addEventListener("input", showSliderValue1, false);

        function showSliderValue1() {
            rangeSquareCount.innerHTML = rangeSquare.value;
        }

        let rangePrice = document.getElementById("filters__price");
        let rangePriceCount = document.getElementById("filters__price-count");

        rangePrice.addEventListener("input", showSliderValue2, false);

        function showSliderValue2() {
            rangePriceCount.innerHTML = rangePrice.value;
        }
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery("form").submit(
        function() { // Изменение: замените "form" на уникальный класс ".section-form__form"
                var form_data = jQuery(this).serialize(); // Собираем данные из полей
                jQuery.ajax({
                    type: "POST",
                    url: "/feedback",
                    data: form_data,
                    headers: {
                        "X-CSRF-TOKEN": $('input[name="_token"]').val()
                    }, // Включение CSRF-токена в заголовок запроса
                    success: function(response) {
                        console.log(response);
                        $("input[name='name']").val('');
                        $("input[name='phone']").val('');
                        $(".feedback").show();
                        $(".feedback-wrap").hide();
                        $(".feedback-done").show();
                        // Дополнительные действия после успешной отправки формы, если необходимо
                    },
                    error: function(xhr, status, error) {
                        // Обработка ошибок, если необходимо
                    }
                });

                return false; // Предотвращение перезагрузки страницы
            });
        });
    </script>
@endsection
