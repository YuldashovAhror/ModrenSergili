@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить вакансию</h5>
                </div>
                <form action="{{ route('dashboard.vacancies.update', $vacancy->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Категория</label>
                                    <div class="col-12 text-center">
                                        <select name="category_id" id="" class="form-select">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @selected($category->id == $vacancy->category_id)>{{ $category->wordName->word_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото проекта</label>
                                    <div class="col-12 text-center">
                                        <img @if($vacancy->photo) src="{{ $vacancy->photo->img }}" @endif style="height: 200px; width: 200px">
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" value="{{ $vacancy->wordName->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" value="{{ $vacancy->wordName->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" value="{{ $vacancy->wordName->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_ru">{{ $vacancy->wordResponsibility->word_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_uz">{{ $vacancy->wordResponsibility->word_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_en">{{ $vacancy->wordResponsibility->word_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_ru">{{ $vacancy->wordRequirement->word_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_uz">{{ $vacancy->wordRequirement->word_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_en">{{ $vacancy->wordRequirement->word_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_ru">{{ $vacancy->wordCondition->word_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_uz">{{ $vacancy->wordCondition->word_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_en">{{ $vacancy->wordCondition->word_en }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
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
