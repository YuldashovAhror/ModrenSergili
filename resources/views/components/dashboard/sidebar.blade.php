<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="/assets/images/dashboard/1.png" alt="">
        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        </a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Меню</h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="globe"></i><span>Проекты</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('dashboard.projects.index') }}">Лист</a></li>
                            <li><a href="{{ route('dashboard.projects.create') }}">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bar-chart-2"></i><span>Карьера</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('dashboard.vacancies.index') }}">Лист</a></li>
                            <li><a href="{{ route('dashboard.vacancies.create') }}">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>Новости / Акции</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('dashboard.new_promotion.index') }}">Лист</a></li>
                            <li><a href="{{ route('dashboard.new_promotion.create') }}">Добавить</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('dashboard.partners.index') }}"><i data-feather="users"></i><span>Партнеры</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('dashboard.about.index') }}"><i data-feather="globe"></i><span>О компании</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('dashboard.words.index')}}"><i data-feather="slack"></i><span>Словарь</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
