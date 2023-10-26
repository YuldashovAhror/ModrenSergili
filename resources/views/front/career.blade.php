@extends('layouts.front.main')

@section('style')
@endsection

@section('content')
    <div class="wrapper">
        <section class="section__banner" style="background-image: url(/img/bg/vacancy.jpg);">
            <div class="general__container">
                <div class="banner">
                    <div class="banner__container">
                        <h1 class="title general__regular">{{__('asd.OXYGEN - Карьера')}}</h1>
                        <p class="subtitle general__regular">{{__('asd.Карьера')}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section__vacancy">
            <div class="general__container">
                <div class="vacancy">
                    <h2 class="vacancy__title general__regular">{{__('asd.Открытая позиция')}}</h2>
                    <div class="vacancy__category">
                        <a href="{{route('career.index')}}" class="cat general__regular  @if ($active == 0) active @endif">{{__('asd.Все')}}</a>
                        @foreach ($category_vacancies as $key=>$category_vacancy)
                            <a href="{{route('career.show', $category_vacancy->id)}}" class="cat general__regular @if ($active == $category_vacancy->id) active @endif ">{{__('asd.'.$category_vacancy->name)}}</a>
                        @endforeach
                    </div>
                    <div class="vacancy__container">
                        @foreach ($vacansies as $vacancy)
                            <div class="vacancy__item" data-aos="fade-up">
                                <div class="content">
                                    <h4 class="name general__regular">{{__('asd.'.$vacancy->name)}}</h4>
                                    {{-- <div class="description general__book">Победитель в номинации бренд года 2021 . . .</div> --}}
                                </div>
                                <button type="button" class="more general__regular">{{__('asd.Подробнее')}}</button>
                                {{-- begin info box for popup --}}
                                <div class="box">
                                    <div class="box__block">
                                        <h4 class="box__name general__corbel-b">{{__('asd.Обязанности')}}</h4>
                                        <div class="box__description general__euclid-r">{!!__('asd.'.$vacancy->responsibility)!!}</div>
                                    </div>
                                    <div class="box__block">
                                        <h4 class="box__name general__corbel-b">{{__('asd.Требования')}}</h4>
                                        <div class="box__description general__euclid-r">
                                            {!!__('asd.'.$vacancy->requirement)!!}
                                        </div>
                                    </div>
                                    <div class="box__block">
                                        <h4 class="box__name general__corbel-b">{{__('asd.Условия')}}</h4>
                                        <div class="box__description general__euclid-r">
                                            {!!__('asd.'.$vacancy->condition)!!}
                                        </div>
                                    </div>
                                </div>
                                {{-- end info box for popup --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- =========POPUP VACANCY========= --}}
    
    <div class="popup__vacancy">
        <span class="close">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L20 20" stroke="white" stroke-width="2" />
                <path d="M20 1L1 20" stroke="white" stroke-width="2" />
            </svg>
        </span>
        <div class="popup__vacancy-container">
            <img src="/img/bg/vacancy-popup.jpg" alt="" class="banner">
            <div class="content">
                <h4 id="content__name" class="content__name general__bold"></h4>
                <div id="content__wrap" class="content__wrap">

                </div>
                <form action="" class="vacancy__form">
                    <h4 class="title general__bold">{{__('asd.Анкета соискателя')}}</h4>
                    <label for="vacancy__name" class="vacancy__form-pocket">
                        <span class="general__book">{{__('asd.Ваше имя')}}</span>
                        <input class="general__regular" id="vacancy__name" type="text" placeholder="{{__('asd.Ваше имя')}}">
                    </label>
                    <label for="vacancy__tel" class="vacancy__form-pocket">
                        <span class="general__book">{{__('asd.Номер телефона')}}</span>
                        <input class="general__regular" id="vacancy__tel" type="tel" placeholder="+998">
                    </label>
                    <button class="vacancy__form-button general__regular">
                        <span>{{__('asd.Отправить заявку')}}</span>
                        <svg width="27" height="20" viewBox="0 0 27 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.405 6.085C3.35625 6.50125 1 9.0875 1 12.25C1 15.7012 3.79875 18.5 7.25 18.5H21C23.7613 18.5 26 16.2613 26 13.5C26 10.7387 23.7613 8.5 21 8.5C21 4.3575 17.6425 1 13.5 1C10.2037 1 7.41125 3.12875 6.405 6.085Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.791 10.5838L13.4998 7.875L16.2085 10.5838" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 14.125V7.875" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- End popup vacancy --}}

    @include('components.front.footer')
@endsection

@section('script')
    <script>
        $(window).on('scroll load', () => {
            ($(window).scrollTop() > 80) ?
            $('.header').addClass('header__dark'):
                $('.header').removeClass('header__dark')
        });

        $(document).on('click', '.vacancy__item button', function(event) {
            event.preventDefault();
            $('#content__name').text('');
            $('#content__wrap').html('');

            let $contentName = $(this).parent().children('.content').find('.name').text();
            let $contentWrap = $(this).parent().find('.box').html();

            console.log($contentName, $contentWrap)

            $('#content__name').text($contentName);
            $('#content__wrap').html($contentWrap);
            $('.popup__back').slideDown('200');

            setTimeout(() => {
                $('.popup__vacancy').fadeIn('200');
            }, 800)

        })

        $('.popup__vacancy .close, .popup__back').click((event) => {
            event.preventDefault();
            $('.popup__vacancy').fadeOut('200')
            setTimeout(() => {
                $('#content__name').text('');
                $('#content__wrap').html('');
                $('.popup__back').slideUp('200');
            }, 250)
        })
    </script>
@endsection
