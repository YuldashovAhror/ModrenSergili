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
                        <h1 class="title general__regular">OXYGEN-<br>
                            the art of creating</h1>
                        <p class="subtitle general__regular">О компании</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__filter">
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
                                    <option value="" selected>Тип</option>
                                    <option value="">Жилые</option>
                                    <option value="">Коммерческие</option>
                                
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5"/>
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__box">
                                <select class="general__regular" name="" id="">
                                    <option value="">Количество комнат</option>
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5"/>
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__box">
                                <select class="general__regular" name="" id="">
                                    <option value="">Локация</option>
                                </select>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="9" fill="#F5F5F5"/>
                                    <path d="M6 8L9 11L12 8" stroke="#031530" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__count" >
                                <div class="filters__count-number ">
                                    <h4 class="general__regular">Площадь до <span id="filters__square-count" class="count__range"></span> м2</h4>
                                </div>
                                <div class="filters__count-range">
                                    <input id="filters__square" class="filters__range" type="range" value="0" min="0" max="378">
                                </div>
                            </div>
                        </div>
                        <div class="filters__item">
                            <div class="filters__count" >
                                <div class="filters__count-number">
                                    <p class="general__book">Стоимость квартиры</p>
                                    <h4 class="general__regular">до <span id="filters__price-count" class="count__range"></span> сум</h4>
                                </div>
                                <div class="filters__count-range">
                                    <input id="filters__price" class="filters__range" type="range" value="0" min="0" max="378">
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
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.9118 4.50348C11.929 2.42964 9.78462 1 7.30627 1C3.82341 1 1 3.82341 1 7.30627C1 10.7891 3.82341 13.6125 7.30627 13.6125C10.7891 13.6125 13.6125 10.7891 13.6125 7.30627M13.6125 1V5.20418H9.40836" stroke="#031530" stroke-width="1.5"/>
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
                    <h2 class="general__title" data-aos="fade-right">{!!__('asd.Проекты <span>все</span>')!!}</h2>
                    <a href="/projects" class="general__top-link" data-aos="fade-left">{{__('asd.Все проекты')}}</a>
                </div>
                <div class="projects ">
                    {{-- @dd($projects); --}}
                    @foreach ($projects as $project)
                        <div class="projects__item" data-aos="fade-up">
                            <div class="pic">
                                <span class="start general__regular">{{__('asd.'.$project->status) }}</span>
                                <img @if (!empty($project->photo->img))src="{{$project->photo->img}}" @endif alt="">
                            </div>
                            <div class="content">
                                <a href="{{route('projects.show', $project->id)}}" class="title general__regular">{{__('asd.'.$project->name) }}</a>
                                <ul class="features">
                                    <li class="features__item general__regular">
                                        <span>{{__('asd.'.$project->location) }}</span>
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
