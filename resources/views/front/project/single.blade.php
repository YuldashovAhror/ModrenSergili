@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/fancybox.css">
    <link rel="stylesheet" href="/css/BeerSlider.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <style>
        .floors__cat a:hover {
            cursor: pointer;
        }

        .wrapper .section__floors .general__title span {
            margin-left: 1rem;
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
                                <img src="{{ $project->imgMain->img ?? null }}" alt="photo">
                            </div>
                            <div class="main__carousel-caption" data-swiper-parallax="0" data-swiper-parallax-opacity="0">
                                <div class="main__carousel-title general__regular" data-swiper-parallax-y="-200"
                                    data-swiper-parallax-scale=".8">
                                    {{ __('asd.' . $project->name) }}
                                </div>
                                <div class="main__carousel-descr">
                                    <div class="main__carousel-description" data-swiper-parallax="200">
                                        <span class="general__book">{!! __('asd.' . $project->about) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!empty($project->imgSlider))
                        @foreach ($project->imgSlider as $slider)
                            <div class="swiper-slide">
                                <div class="main__carousel-frame" data-swiper-parallax-opacity="0">
                                    <div class="main__carousel-photo" data-swiper-parallax="-100"
                                        data-swiper-parallax-scale="1.2">
                                        <img src="{{ $slider->img }}" alt="photo">
                                    </div>
                                    {{--                               <div class="main__carousel-caption" data-swiper-parallax="0" data-swiper-parallax-opacity="0"> --}}
                                    {{--                                   <div class="main__carousel-title general__regular" data-swiper-parallax-y="-200" data-swiper-parallax-scale=".8"> --}}
                                    {{--                                       Modern sergle --}}
                                    {{--                                   </div> --}}
                                    {{--                                   <div class="main__carousel-descr"> --}}
                                    {{--                                       <div class="main__carousel-description" data-swiper-parallax="200"> --}}
                                    {{--                                           <div class="general__book desc-one">Ключ к счастливой жизни!</div> --}}
                                    {{--                                           <div class="general__book desc-two">Ключ к счастливой жизни!</div> --}}
                                    {{--                                       </div> --}}
                                    {{--                                   </div> --}}
                                    {{--                               </div> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="main__carousel-navigation general__container">
                    <a href="#section__privilege" class="main__bottom">
                        <span class="general__book">{{__('asd.Прокрутить вниз')}}</span>
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
        <section class="section__privilege" id="section__privilege">
            @if (!empty($project->advantages))
                @foreach ($project->advantages as $advantage)
                    <div class="privilege">
                        <div class="general__container">
                            <div class="privilege__container">
                                <div class="privilege__picture">
                                    <div class="pic anima-blocks">
                                        <a class="general__view" href="/img/gallery/1.jpg" data-fancybox="gallery"></a>
                                        <img src="{{ $advantage->img->img }}" alt="">
                                    </div>
                                </div>
                                <div class="privilege__content" data-aos="fade-up">
                                    <h2 class="title general__title">{{ __('asd.' . $advantage->title) }}</h2>
                                    <ul class="privilege__list">
                                        @foreach ($advantage->wordItem as $item)
                                            <li>
                                                <span class="ico">
                                                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.195 1.78273C13.9194 0.26449 16.0806 0.264489 16.805 1.78273L19.7168 7.8848C20.0084 8.49582 20.5892 8.91785 21.2604 9.00633L27.9636 9.88994C29.6315 10.1098 30.2993 12.1651 29.0792 13.3233L24.1756 17.9782C23.6846 18.4443 23.4627 19.1272 23.586 19.7929L24.817 26.441C25.1233 28.0952 23.3749 29.3654 21.8964 28.563L15.954 25.3378C15.359 25.0148 14.641 25.0148 14.046 25.3378L8.1036 28.563C6.62509 29.3654 4.87671 28.0952 5.183 26.441L6.41404 19.7929C6.53731 19.1272 6.31543 18.4443 5.82442 17.9782L0.920792 13.3233C-0.299271 12.1651 0.368552 10.1098 2.03636 9.88994L8.73956 9.00633C9.41076 8.91785 9.99165 8.49582 10.2832 7.8848L13.195 1.78273Z"
                                                            fill="#009789" />
                                                    </svg>
                                                </span>
                                                <p class="general__regular">{{ __('asd.' . $item->key) }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
        <section class="section__genplan">
            <div class="genplan">
                <div class="genplan-img">
                    <img src="{{ $project->imgPlan->img ?? null }}" alt="genplan">
                    <svg width="1920" height="995" viewBox="{{ $project->svg->first()->viewBox }}" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        @if (!empty($project->svg))
                            @foreach ($project->svg as $svg)
                                <a href="#section__floors" style="cursor: pointer"
                                    onclick="building_change({{ $svg->building->id }})">
                                    <path d="{{ $svg->coordinates }}" fill="#009789" fill-opacity="0.6" />
                                </a>
                            @endforeach
                        @endif
                    </svg>
                </div>
            </div>
            <div class="genplan__banner">
                <button class="genplan__banner-btn">
                    <span class="general__regular">{{__('asd.Выберите корпус')}}</span>
                </button>
            </div>
        </section>
        <section class="section__floors" id="section__floors">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">
                        {!!__('asd.Квартиры и цены <span> в блоке -')!!}
                            <select name="" id="building_id" onchange="building_change()">
                                @foreach ($project->buildings as $building)
                                    <option value="{{ $building->id }}">{{ __("asd.$building->name") }}</option>
                                @endforeach
                            </select>
                        </span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="12" fill="#F5F5F5" />
                            <path d="M8 10.6667L12 14.6667L16 10.6667" stroke="#009789" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </h2>
                    <div class="floors__cat" data-aos="fade-left">
                        <a class="floors__cat-btn general__regular active" onclick="type_change('residential')"
                            type="button">{{__('asd.Жилая')}}</a>
                        <a class="floors__cat-btn general__regular" onclick="type_change('commercial')"
                            type="button">{{__('asd.Коммерческая')}}</a>
                        <input type="hidden" id="type" value="residential">
                    </div>
                </div>
                <div class="floors">
                    <div class="floors__wrap" data-aos="fade-right">
                        <div class="floors__carousel owl-carousel">
                            @foreach ($plans as $plan)
                                <div class="floors__item">
                                    <div id="beer-slider" class="beer-slider" data-beer-label="before"
                                        data-beer-start="25">
                                        <img src="{{ $plan->imgMain->img }}" alt="before">
                                        <div class="beer-reveal" data-beer-label="after">
                                            <img src="{{ $plan->img3d->img }}" alt="after">
                                        </div>
                                    </div>
                                    <div class="floors__content">
                                        <h5 class="floors__content-title general__regular">{{ __("asd.$plan->name") }}
                                        </h5>
                                        <div class="floors__content-info">
                                            <div class="floors__mains">
                                                <div class="blocks">
                                                    <span class="general__book">{{__('asd.Стоимость')}}</span>
                                                    <p class="blocks__numbers general__book">{{__('asd.от')}}
                                                        <span id="price"
                                                            class="general__regular">{{ $plan->price_from }}</span>
                                                        {{__('asd.сум')}}
                                                    </p>
                                                </div>
                                                <div class="blocks">
                                                    <span class="general__book">{{__('asd.Площадь')}}</span>
                                                    <p class="blocks__numbers general__book">{{__('asd.от')}}
                                                        <span id="price"
                                                            class="general__regular">{{ $plan->area }}</span>
                                                        м²
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="floors__content-desc general__book">
                                                {{__('asd.Не является публичной офертой, уточняйте наличие квартир и актуальную стоимость в отделе продаж')}}
                                            </div>
                                            <div class="floors__content-container">
                                                @foreach ($plan->rooms as $room)
                                                    <div class="box">
                                                        <span class="general__book">{{ $room['name'] }}</span>
                                                        <p class="general__regular">{{ $room['area'] }} м²</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="floors__wrap-bottom">
                            <div class="floors__carousel-buttons">
                                <button class="floors__prev">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.64625 15L12.055 22.7938L11.25 23.75L0 14.3488L11.25 5L12.0563 5.955L2.645 13.75H30V15H2.64625Z"
                                            fill="white" />
                                    </svg>
                                </button>
                                <button class="floors__next">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M27.3537 15L17.945 22.7938L18.75 23.75L30 14.3488L18.75 5L17.9437 5.955L27.355 13.75H0V15H27.3537Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </div>
                            <div id="floors__dots" class="floors__carousel-dots"></div>
                        </div>
                    </div>
                    <div class="floors__info" data-aos="fade-left">
                        <h4 class="floors__info-title general__regular"></h4>
                        <form action="" class="floors__filters">
                            <label for="floors__filter" class="floors__filters-box">
                                <select name="" id="floors__filter" class="general__regular"
                                    onchange="room_count_change()">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }} {{__('asd.— Комнатные')}}</option>
                                    @endfor
                                </select>
                                <svg width="13" height="9" viewBox="0 0 13 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6.5 7L12 1" stroke="#231F20" stroke-width="2" />
                                </svg>
                            </label>
                            <label for="floors__plan" class="floors__filters-box">
                                <select name="" id="floors__plan" class="general__regular">
                                    @foreach ($plans as $plan)
                                        <option value="">{{ __("asd.$plan->name") }}</option>
                                    @endforeach
                                </select>
                                <svg width="13" height="9" viewBox="0 0 13 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6.5 7L12 1" stroke="#231F20" stroke-width="2" />
                                </svg>
                            </label>
                        </form>
                        <div class="floors__info-container">
                        </div>
                        <a href="" class="floors__callback general__regular callback"
                            type="button">{{__('asd.ЗАБРОНИРОВАТЬ')}}</a>
                    </div>
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
                                <input class="general__regular" type="tel" placeholder="" maxlength="19"
                                    pattern="^[0-9-+\s()]*$">
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
        <section class="section__place">
            <div class="general__container">
                <div class="general__top">
                    <h2 class="general__title" data-aos="fade-right">
                        {!!__('asd.Места по <span>близости</span>')!!}
                    </h2>
                </div>
            </div>
            <div class="place__carousel swiper" data-aos="fade-left">
                <div class="swiper-wrapper">
                    @if (!empty($project->placesNearly))
                        @foreach ($project->placesNearly as $place)
                            <div class="swiper-slide">
                                <div class="place__item">
                                    <div class="pic">
                                        <img src="{{ $place->photo->img }}" alt="">
                                        <a class="general__view" href="{{ $place->photo->img }}"
                                            data-fancybox="gallery"></a>
                                    </div>
                                    <p class="name general__regular">{{ $place->wordName->word_ru }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        {{--        <section class="section__projects"> --}}
        {{--            <div class="general__container"> --}}
        {{--                <div class="general__top"> --}}
        {{--                    <h2 class="general__title" data-aos="fade-right">Проекты</h2> --}}
        {{--                    <a href="/projects" class="general__top-link" data-aos="fade-left">Все проекты</a> --}}
        {{--                </div> --}}
        {{--                <div class="projects projects__main"> --}}
        {{--                    <?php for ($i = 1; $i < 4; $i++):?> --}}
        {{--                    <div class="projects__item" data-aos="fade-up"> --}}
        {{--                        <div class="pic"> --}}
        {{--                            <span class="start general__regular">Старт продаж</span> --}}
        {{--                            <img src="<?php echo '/img/gallery/' . $i . '.jpg'; ?>" alt=""> --}}
        {{--                        </div> --}}
        {{--                        <div class="content"> --}}
        {{--                            <a href="/projects-single" class="title general__regular">Modern Sergeli</a> --}}
        {{--                            <div class="subtitle general__book">labore et dolore</div> --}}
        {{--                            <ul class="features"> --}}
        {{--                                <li class="features__item general__regular"> --}}
        {{--                                    <span>Sergle metro</span> --}}
        {{--                                </li> --}}
        {{--                                <li class="features__item general__regular"> --}}
        {{--                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
        {{--                                        <path d="M0.865522 4.33922L1.82995 1.44594C2.11829 0.580913 2.9241 0 3.83565 0H10.2638C11.1753 0 11.9811 0.580913 12.2695 1.44594L13.2339 4.33922C13.7422 4.55213 14.0996 5.05408 14.0996 5.63993V9.16488C14.0996 9.68516 13.8148 10.1349 13.3946 10.3796V11.2072V11.9848C13.3946 12.3747 13.0795 12.6898 12.6896 12.6898H11.9846C11.5948 12.6898 11.2796 12.3747 11.2796 11.9848V10.5749H2.81976V11.9848C2.81976 12.3747 2.50463 12.6898 2.11477 12.6898H1.40977C1.01991 12.6898 0.704784 12.3747 0.704784 11.9848V10.3796C0.28461 10.1349 -0.000206947 9.68587 -0.000206947 9.16488V5.63993C-0.000206947 5.05408 0.357224 4.55213 0.865522 4.33922ZM10.2638 1.40998H3.83635C3.5325 1.40998 3.2632 1.60315 3.16732 1.8922L2.3876 4.22994H2.94736H11.152H11.7118L10.9328 1.8922C10.8362 1.60315 10.5669 1.40998 10.2638 1.40998ZM11.6321 8.45989C12.2159 8.45989 12.6896 7.98614 12.6896 7.4024C12.6896 6.81867 12.2159 6.34492 11.6321 6.34492C11.0484 6.34492 10.5747 6.81867 10.5747 7.4024C10.5747 7.98614 11.0484 8.45989 11.6321 8.45989ZM2.46726 8.45989C3.05099 8.45989 3.52475 7.98614 3.52475 7.4024C3.52475 6.81867 3.05099 6.34492 2.46726 6.34492C1.88353 6.34492 1.40977 6.81867 1.40977 7.4024C1.40977 7.98614 1.88353 8.45989 2.46726 8.45989Z" fill="#707070"/> --}}
        {{--                                    </svg> --}}
        {{--                                    <span>35min</span> --}}
        {{--                                </li> --}}
        {{--                            </ul> --}}
        {{--                            <div class="content__bottom"> --}}
        {{--                                <p class="amount general__regular">15 квартир</p> --}}
        {{--                                <h6 class="price general__book">20,5 млн</h6> --}}
        {{--                            </div> --}}
        {{--                        </div> --}}
        {{--                    </div> --}}
        {{--                    <?php endfor ?> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </section> --}}
    </div>

    @include('components.front.footer')
@endsection

@section('script')
    <script src="/js/swiper.min.js"></script>
    <script src="/js/fancybox.umd.js"></script>
    <script src="/js/BeerSlider.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script>
        var catBtns = document.querySelectorAll('.floors__cat-btn');
        catBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                catBtns.forEach(btn => {
                    btn.classList.remove('active');
                });

                btn.classList.add('active');
            });
        });

        function building_change(building_id) {
            if (building_id != null) {
                $('#building_id').val(building_id);
            }
            send();
        }

        function room_count_change() {
            send();
        }

        function type_change(type) {
            $('#type').val(type);
            send();
        }

        function send() {
            var sendData = {
                building_id: $('#building_id').val(),
                number_of_rooms: $('#floors__filter').val(),
                type: $('#type').val()
            };
            console.log(sendData);

            $.ajax({
                url: '/filter',
                method: 'POST',
                data: JSON.stringify(sendData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Добавление CSRF-токена в заголовок запроса
                },
                success: function(response) {

                    // Вставка данных в div с классом "floors__carousel"
                    // var carouselDiv = $('.floors__carousel');
                    // carouselDiv.empty(); // Очистка содержимого div перед вставкой новых данных
                    //
                    var html = '';
                    // console.log(response['data'].length)
                    if (response.length === 0) {
                        html = '<div class="floors__item">' +
                            '<div id="beer-slider" class="beer-slider" data-beer-label="before" data-beer-start="25">' +
                            '<img src="" alt="before">' +
                            '<div class="beer-reveal" data-beer-label="after">' +
                            '<img src="" alt="after">' +
                            '</div>' +
                            '</div>' +
                            '<div class="floors__content">' +
                            '<h5 class="floors__content-title general__regular">Ничего не найдено</h5>' +
                            '<div class="floors__content-info">' +
                            '<div class="floors__mains">' +
                            ' <div class="blocks">' +
                            '<span class="general__book">Стоимость</span>' +
                            ' <p class="blocks__numbers general__book">от' +
                            ' <span id="price" class="general__regular"></span>' +
                            'сум</p>' +
                            '  </div>' +
                            '<div class="blocks">' +
                            '<span class="general__book">Площадь</span>' +
                            '<p class="blocks__numbers general__book">от' +
                            '<span id="price" class="general__regular"></span>' +
                            ' м²</p>' +
                            ' </div>' +
                            '</div>' +
                            '<div class="floors__content-desc general__book">' +
                            'Не является публичной офертой, уточняйте наличие квартир и актуальную стоимость в отделе продаж' +
                            '</div>' +
                            '<div class="floors__content-container">' +
                            ' </div>' +
                            '</div>' +
                            ' </div>' +
                            '</div>'
                    } else {
                        for (var i = 0; i < response.length; i++) {
                            var item = response[i];
                            html += '<div class="floors__item">' +
                                '<div id="beer-slider" class="beer-slider" data-beer-label="before" data-beer-start="25">' +
                                '<img src="' + item.imgMain + '" alt="before">' +
                                '<div class="beer-reveal" data-beer-label="after">' +
                                '<img src="' + item.img3d + '" alt="after">' +
                                '</div>' +
                                '</div>' +
                                '<div class="floors__content">' +
                                '<h5 class="floors__content-title general__regular">' + item.name + '</h5>' +
                                '<div class="floors__content-info">' +
                                '<div class="floors__mains">' +
                                ' <div class="blocks">' +
                                '<span class="general__book">Стоимость</span>' +
                                ' <p class="blocks__numbers general__book">от' +
                                ' <span id="price" class="general__regular">' + item.price_from + '</span>' +
                                'сум</p>' +
                                '  </div>' +
                                '<div class="blocks">' +
                                '<span class="general__book">Площадь</span>' +
                                '<p class="blocks__numbers general__book">от' +
                                '<span id="price" class="general__regular">' + item.area + '</span>' +
                                ' м²</p>' +
                                ' </div>' +
                                '</div>' +
                                '<div class="floors__content-desc general__book">' +
                                'Не является публичной офертой, уточняйте наличие квартир и актуальную стоимость в отделе продаж' +
                                '</div>' +
                                '<div class="floors__content-container">'
                            {{--                                    @foreach ($plan->rooms as $room) --}}
                            {{--                                    <div class="box"> --}}
                            {{--                                    <span class="general__book">{{ $room['name'] }}</span> --}}
                            {{--                                    <p class="general__regular">{{ $room['area'] }} м²</p> --}}
                            {{--                                    </div> --}}
                            {{--                                    @endforeach --}}
                                +
                                ' </div>' +
                                '</div>' +
                                ' </div>' +
                                '</div>'
                        }
                    }
                    setTimeout(function() {
                        $('.floors__carousel').fadeOut('250');
                        $('.floors__carousel').html(html);
                        $('.floors__carousel').owlCarousel('destroy');
                    }, 500)
                    setTimeout(() => {
                        let carouselLength = $('.floors__item').length
                        if (carouselLength <= 4) {
                            carouselLength = 2
                        } else {
                            carouselLength = 3
                        }

                        let slideChange = event => {
                            if (!event.namespace) {
                                return;
                            }
                            let slides = event.relatedTarget;

                            $('.floors__item').removeClass('floors__item-active');
                            $('.floors__item').eq(slides.current()).addClass('floors__item-active');
                            let $title = $('.floors__item').eq(slides.current()).find(
                                '.floors__content-title').text();
                            let $files = $('.floors__item').eq(slides.current()).find(
                                '.floors__content-info').html();
                            $('.floors__info-title').text('');
                            $('.floors__info-container').html('');

                            $('.floors__info-title').text($title)
                            $('.floors__info-container').html($files)
                            // console.log($files)
                            // let src = $('.news__item').eq(slides.current()).find('.news__file').attr('src')

                            // $('.news__banner video source').attr('src', src)
                            // $('.news__banner video ').attr('poster', src)

                        }

                        $('.floors__carousel').owlCarousel({
                            // dots: false,
                            nav: false,
                            mouseDrag: false,
                            touchDrag: false,
                            smartSpeed: 700,
                            lazyLoad: true,
                            onInitialized: slideChange,
                            onChanged: slideChange,
                            autoplay: false,
                            autoplayTimeout: 3000,
                            loop: true,
                            dotsContainer: '#floors__dots',
                            responsiveBaseElement: 'body',
                            responsive: {
                                0: {
                                    items: 1,
                                    mouseDrag: false,
                                },
                                700: {
                                    items: 1,
                                    mouseDrag: false,
                                },

                                1300: {
                                    items: 1,
                                },
                            }

                        })

                        $('.floors__prev').click(() => {
                            $('.floors__carousel').trigger('prev.owl.carousel', [700]);
                            $('.floors__carousel').trigger('stop.owl.autoplay')
                        })
                        $('.floors__next').click(() => {
                            $('.floors__carousel').trigger('next.owl.carousel', [700]);
                            $('.floors__carousel').trigger('stop.owl.autoplay')
                        })

                        $('.floors__carousel').fadeIn('250');

                        $.fn.BeerSlider = function(options) {
                            options = options || {};
                            return this.each(function() {
                                new BeerSlider(this, options);
                            });
                        };
                        $('.beer-slider').BeerSlider({
                            start: 50
                        });
                    }, 500)


                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script>
        $(window).on('scroll load', () => {
            ($(window).scrollTop() > 80) ?
            $('.header').addClass('header__dark'):
                $('.header').removeClass('header__dark')
        });

        $(window).on('load', function() {
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
                }
            });

            let swiperPlace = new Swiper(".place__carousel", {
                slidesPerView: 4.5,
                spaceBetween: 30,
                centeredSlides: true,
                loop: true,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 50,
                    },
                },
            });

            setTimeout(() => {
                let carouselLength = $('.floors__item').length
                if (carouselLength <= 4) {
                    carouselLength = 2
                } else {
                    carouselLength = 3
                }

                let slideChange = event => {
                    if (!event.namespace) {
                        return;
                    }
                    let slides = event.relatedTarget;

                    $('.floors__item').removeClass('floors__item-active');
                    $('.floors__item').eq(slides.current()).addClass('floors__item-active');
                    let $title = $('.floors__item').eq(slides.current()).find('.floors__content-title')
                        .text();
                    let $files = $('.floors__item').eq(slides.current()).find('.floors__content-info')
                        .html();
                    $('.floors__info-title').text('');
                    $('.floors__info-container').html('');

                    $('.floors__info-title').text($title)
                    $('.floors__info-container').html($files)
                    // console.log($files)
                    // let src = $('.news__item').eq(slides.current()).find('.news__file').attr('src')

                    // $('.news__banner video source').attr('src', src)
                    // $('.news__banner video ').attr('poster', src)

                }

                $('.floors__carousel').owlCarousel({
                    // dots: false,
                    nav: false,
                    mouseDrag: false,
                    touchDrag: false,
                    smartSpeed: 700,
                    lazyLoad: true,
                    onInitialized: slideChange,
                    onChanged: slideChange,
                    autoplay: false,
                    autoplayTimeout: 3000,
                    loop: true,
                    dotsContainer: '#floors__dots',
                    responsiveBaseElement: 'body',
                    responsive: {
                        0: {
                            items: 1,
                            mouseDrag: false,
                        },
                        700: {
                            items: 1,
                            mouseDrag: false,
                        },

                        1300: {
                            items: 1,
                        },
                    }

                })

                $('.floors__prev').click(() => {
                    $('.floors__carousel').trigger('prev.owl.carousel', [700]);
                    $('.floors__carousel').trigger('stop.owl.autoplay')
                })
                $('.floors__next').click(() => {
                    $('.floors__carousel').trigger('next.owl.carousel', [700]);
                    $('.floors__carousel').trigger('stop.owl.autoplay')
                })
            }, 500)

            $.fn.BeerSlider = function(options) {
                options = options || {};
                return this.each(function() {
                    new BeerSlider(this, options);
                });
            };
            $('.beer-slider').BeerSlider({
                start: 50
            });

            $('.genplan__banner-btn').click((event) => {
                event.preventDefault();

                $('.genplan__banner').fadeOut('slow');
            })

        });
    </script>
@endsection
