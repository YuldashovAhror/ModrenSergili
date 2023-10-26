@extends('layouts.dashboard.main')
@section('styles')
    <style>
        .map {
            height: 1050px;
            position: relative;
            overflow: hidden;
        }

        .map img {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 3;
            width: 100%;
            height: auto;
            -webkit-transition: .3s all;
            transition: .3s all;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .map svg {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 3;
            width: 100%;
            height: auto;
            -webkit-transition: .3s all;
            transition: .3s all;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .map svg path {
            opacity: 0.5;
            fill: blue;
            cursor: pointer;
            transition: 0.3s;
        }

        .map path:hover {
            opacity: 0.8;
            transition: 0.3s;
        }

        .map path[checked=checked] {
            opacity: 0.8;
            transition: 0.3s;
            fill: red;
        }

        .map polygon {
            opacity: 0.5;
            fill: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .map polygon:hover {
            opacity: 0.8;
            transition: 0.3s;
        }

        .map polygon[checked=checked] {
            opacity: 0.8;
            transition: 0.3s;
            fill: red;
        }

        .map img {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 100%;
            height: auto;
        }

        .map input[type=radio] {
            visibility: visible;
        }

        [data-selected=true] {
            fill: red;
        }

        [data-selected=false] {
            fill: olive;
            opacity: .5;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>{{ $project->wordName->word_ru }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="map">
            <img src="{{ $project->imgPlan->img }}" alt="building">
            <svg viewBox="{{ $project->svg->first()->viewBox }}" xmlns="http://www.w3.org/2000/svg">
                @foreach($project->svg as $p)
                    <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $p->id }}">
                        <path d="{{ $p->coordinates }}" checked="false" class="main_svg_{{$p->id}}" onclick="ali({{ $p->id }})" id="{{ $p->id }}"/>
                    </a>
                @endforeach
            </svg>
            @foreach($project->svg as $p)
            <div class="modal fade" id="exampleModalCenter{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        @if(\App\Models\Building::where('svg_id', $p->id)->first())
                            <div class="modal-header">
                                <h5 class="modal-title">Данные о блоке</h5>
                                <a href="{{ route('dashboard.building.plans', $p->building->id) }}"><button class="btn btn-warning" type="button">Планировки</button></a>
                            </div>
                            <form action="{{ route('dashboard.buildings.update', $p->building->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" value="{{ $p->building->wordName->word_ru }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" value="{{ $p->building->wordName->word_uz }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" value="{{ $p->building->wordName->word_en }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Изменить</button>
                                </div>
                            </form>
                        @else
                            <div class="modal-header">
                                <h5 class="modal-title">Данные о блоке</h5>
                            </div>
                            <form action="{{ route('dashboard.buildings.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="svg_id" value="{{ $p->id }}">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    @foreach($project->svg as $p)
        <script>
            var colors = "0f0 0ff f60 f0f 00f f00".split(' '), i = 0;
            jQuery(function ali_{{$p->id}}($) {
                $('path').click(function () {
                    this.style.fill = "#" + colors[i++ % colors.length];
                });
            });
        </script>
    @endforeach
    <script>
        function ali(id) {
            jQuery("path.main_svg").attr('checked', false);
            jQuery("polygon.main_svg").attr('checked', false);
            $('input[name=svg_id][checked=checked]').attr('checked', false);
            jQuery("#svg_" + id).attr('checked', true);
            $('input[name=svg_id][value=' + id + ']').attr('checked', 'checked');
        }
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
