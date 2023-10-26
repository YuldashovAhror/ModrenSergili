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
                        <h1 class="title general__regular">{!!__('asd.OXYGEN-<br> the art of creating')!!}</h1>
                        <p class="subtitle general__regular">{{__('asd.О компании')}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__us">
            <div class="general__container">
                <div class="us">
                    <div class="pic" data-aos="fade-up">
                        <a class="general__view" href=""></a>
                        <img src="{{$about->photo}}" alt="">
                    </div>
                    <div class="us__columns" data-aos="fade-left">
                        <h2 class="title general__regular">{{__('asd.О нашей компании')}}</h2>
                        <div class="subtitle general__light">
                            {!!$about['description_'.$lang]!!}
                        </div>
                        <div class="us__buttons">
                            <a href="" download="" class="us__btn general__regular"> {{__('asd.Скачать презентацию')}}</a>
                            <a href="/projects" class="us__btn general__regular">{{__('asd.Проекты')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__advantages">
            <div class="general__container">
                <div class="advantages">
                    <div class="advantages__item" data-aos="fade-up">
                        <img src="/img/about/a-1.svg" alt="">
                        <div class="content">
                            <h4 class="number general__light">{{__('asd.575k')}}</h4>
                            <p class="name general__regular">{{__('asd.метр2')}}</p>
                        </div>
                    </div>
                    <div class="advantages__item" data-aos="fade-up">
                        <img src="/img/about/a-2.svg" alt="">
                        <div class="content">
                            <h4 class="number general__light">{{__('asd.17')}}</h4>
                            <p class="name general__regular">{{__('asd.проектов')}}</p>
                        </div>
                    </div>
                    <div class="advantages__item" data-aos="fade-up">
                        <img src="/img/about/a-1.svg" alt="">
                        <div class="content">
                            <h4 class="number general__light">{{__('asd.575k')}}</h4>
                            <p class="name general__regular">{{__('asd.метр2')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__partners">
            <div class="general__container">
                <h2 class="general__title" data-aos="fade-right">{{__('asd.Партнёры')}}</h2>
                <div class="partners">
                    @foreach ($partners as $partner)
                        <div class="partners__item" data-aos="flip-left"><img src="{{$partner->logo}}" alt=""></div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section__feedback page">
            <div class="general__container">
                <div class="feedback">
                    <div class="feedback__column" data-aos="fade-right">
                        <h2 class="feedback__title general__regular">
                            {{__('asd.Получить консультацию специалиста')}}
                        </h2>
                        <p class="feedback__subtitle">{{__('asd.Закажите в один клик обратный звонок!')}}</p>
                        <form action="" class="feedback__form">
                            <div class="block">
                                <span class="general__book">{{__('asd.Ваше имя')}}</span>
                                <input class="general__regular" type="text" required>
                            </div>
                            <div class="block">
                                <span class="general__book">{{__('asd.Номер телефона')}}</span>
                                <input class="general__regular" type="tel" placeholder="" maxlength="19" pattern="^[0-9-+\s()]*$">
                            </div>
                            <button class="submits general__regular" type="submit">{{__('asd.Отправить заявку')}}</button>
                        </form>
                    </div>
                    <div class="feedback__column" data-aos="fade-left">
                        <img src="/img/bg/feedback-2.png" class="feedback__bg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="section__projects">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">{{__('asd.Проекты')}}</h2>
                    <a href="/projects" class="general__top-link" data-aos="fade-left">{{__('asd.Все проекты')}}</a>
                </div>
                <div class="projects projects__main">
                    @foreach ($projects as $project)
                        <div class="projects__item" data-aos="fade-up">
                            <div class="pic">
                                <span class="start general__regular">{{__('asd.'.$project->status) }}</span>
                                <img @if (!empty($project->photo->img))src="{{$project->photo->img}}" @endif alt="">
                            </div>
                            <div class="content">
                                <a href="{{route('projects.show', $project->id)}}" class="title general__regular">{{__('asd.'.$project->name) }}</a>
                                {{-- <div class="subtitle general__book">labore et dolore</div> --}}
                                <ul class="features">
                                    <li class="features__item general__regular">
                                        <span>{{__('asd.'.$project->location) }}</span>
                                    </li>
                                    <li class="features__item general__regular">
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.865522 4.33922L1.82995 1.44594C2.11829 0.580913 2.9241 0 3.83565 0H10.2638C11.1753 0 11.9811 0.580913 12.2695 1.44594L13.2339 4.33922C13.7422 4.55213 14.0996 5.05408 14.0996 5.63993V9.16488C14.0996 9.68516 13.8148 10.1349 13.3946 10.3796V11.2072V11.9848C13.3946 12.3747 13.0795 12.6898 12.6896 12.6898H11.9846C11.5948 12.6898 11.2796 12.3747 11.2796 11.9848V10.5749H2.81976V11.9848C2.81976 12.3747 2.50463 12.6898 2.11477 12.6898H1.40977C1.01991 12.6898 0.704784 12.3747 0.704784 11.9848V10.3796C0.28461 10.1349 -0.000206947 9.68587 -0.000206947 9.16488V5.63993C-0.000206947 5.05408 0.357224 4.55213 0.865522 4.33922ZM10.2638 1.40998H3.83635C3.5325 1.40998 3.2632 1.60315 3.16732 1.8922L2.3876 4.22994H2.94736H11.152H11.7118L10.9328 1.8922C10.8362 1.60315 10.5669 1.40998 10.2638 1.40998ZM11.6321 8.45989C12.2159 8.45989 12.6896 7.98614 12.6896 7.4024C12.6896 6.81867 12.2159 6.34492 11.6321 6.34492C11.0484 6.34492 10.5747 6.81867 10.5747 7.4024C10.5747 7.98614 11.0484 8.45989 11.6321 8.45989ZM2.46726 8.45989C3.05099 8.45989 3.52475 7.98614 3.52475 7.4024C3.52475 6.81867 3.05099 6.34492 2.46726 6.34492C1.88353 6.34492 1.40977 6.81867 1.40977 7.4024C1.40977 7.98614 1.88353 8.45989 2.46726 8.45989Z" fill="#707070"/>
                                        </svg>
                                        {{-- <span>35min</span> --}}
                                    </li>
                                </ul>
                                <div class="content__bottom">
                                    {{-- <p class="amount general__regular">15 квартир</p> --}}
                                    <h6 class="price general__book">{{$project->price_from}} {{__('asd.млн')}}</h6>
                                </div>
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
                $('.header').addClass('header__dark') :
                $('.header').removeClass('header__dark')
        });

        $(window).on('load', function () {
            $('.section__news').addClass('')
        });

    </script>
@endsection
