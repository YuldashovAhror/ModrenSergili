@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Изменить</h5>
                </div>
                <form action="{{ route('dashboard.new_promotion.update', $newPromotion) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Выберите тип</label>
                                    <div class="col-12 text-center">
                                        <select name="type" id="" class="form-select">
                                            <option value="1" @if($newPromotion->type == 1) selected @endif>Новосоть</option>
                                            <option value="2" @if($newPromotion->type == 2) selected @endif>Акция</option>
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
                                        @if (!empty($newPromotion->photo->img))
                                        <img src="{{ $newPromotion->photo->img }}" style="height: 100px; width: 100px">
                                        @endif
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_ru" value="{{ $newPromotion->wordTitle->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_uz" value="{{ $newPromotion->wordTitle->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_en" value="{{ $newPromotion->wordTitle->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_ru">{{ $newPromotion->wordDescription->word_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_uz">{{ $newPromotion->wordDescription->word_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_en">{{ $newPromotion->wordDescription->word_en }}</textarea>
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
