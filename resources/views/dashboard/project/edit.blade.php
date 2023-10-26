@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Изменить проект</h5>
                </div>
                <div class="col-12 text-center">

                </div>
                <form action="{{ route('dashboard.projects.update', $project) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото проекта</label>
                                    <div class="col-12 text-center">
                                        <img src="{{ $project->imgMain->img }}" alt="" style="height: 200px;">
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput2">Фото План</label>
                                    <div class="col-12 text-center">
                                        <img src="{{ $project->imgPlan->img }}" alt="" style="height: 200px;">
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput2" type="file" name="photo_plan">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput3">План svg</label>
                                    <div class="col-12 text-center">
                                        <div class="map" style="height: 200px;">
                                            {{--<img src="{{ $project->imgPlan->img }}" alt="building">--}}
                                            <svg viewBox="{{ $project->svg->first()->viewBox }}" xmlns="http://www.w3.org/2000/svg">
                                                @foreach($project->svg as $p)
                                                    <path d="{{ $p->coordinates }}" checked="false" class="main_svg_{{$p->id}}" onclick="ali({{ $p->id }})" id="{{ $p->id }}"/>
                                                @endforeach
                                            </svg>
                                        </div>
                                    <input class="form-control" type="file" id="exampleFormControlInput3" name="svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Название RU</label>
                                    <input class="form-control" type="text" name="name_ru" value="{{ $project->wordName->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Название UZ</label>
                                    <input class="form-control" type="text" name="name_uz" value="{{ $project->wordName->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Название EN</label>
                                    <input class="form-control" type="text" name="name_en" value="{{ $project->wordName->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Статус RU</label>
                                    <input class="form-control" type="text" name="status_ru" value="{{ $project->wordStatus->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Статус UZ</label>
                                    <input class="form-control" type="text" name="status_uz" value="{{ $project->wordStatus->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Статус EN</label>
                                    <input class="form-control" type="text" name="status_en" value="{{ $project->wordStatus->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Локация RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="location_ru" value="{{ $project->wordLocation->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Локация UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="location_uz" value="{{ $project->wordLocation->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Локация EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="location_en" value="{{ $project->wordLocation->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Площадь От</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="area_from" value="{{ $project->area_from }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Площадь До</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="area_to" value="{{ $project->area_to }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Стоимость От</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="price_from" value="{{ $project->price_from }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">О проекте/Пункты RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="about_ru">{{ $project->wordAbout->word_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">О проекте/Пункты UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="about_uz">{{ $project->wordAbout->word_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">О проекте/Пункты EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="about_en">{{ $project->wordAbout->word_en }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection

