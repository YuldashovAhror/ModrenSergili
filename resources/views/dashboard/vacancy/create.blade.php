@extends('layouts.dashboard.main')

@section('content')
{{--    Category Modal--}}
    {{--Index--}}
    <div class="modal fade" id="exampleModalCenterIndex" tabindex="-1" aria-labelledby="exampleModalCenter"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title">Все категории</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название RU</th>
                            <th scope="col">Название RU</th>
                            <th scope="col">Название RU</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($k=1)
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $k }}</th>
                                <form action="{{ route('dashboard.category_vacancy.update', $category->id) }}" method="post">
                                    @csrf
                                    {{ method_field('put') }}
                                    <td><input value="{{ $category->wordName->word_ru }}" class="form-control" name="name_ru"></td>
                                    <td><input type="text" value="{{ $category->wordName->word_uz }}" class="form-control" name="name_uz"></td>
                                    <td><input type="text" value="{{ $category->wordName->word_en }}" class="form-control" name="name_en"></td>
                                    <td style="display: flex">
                                        <button class="btn btn-xs btn-success"><i data-feather="edit-2"></i></button>
                                </form>
                                <form action="{{ route('dashboard.category_vacancy.destroy', $category->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-xs btn-danger"><i data-feather="trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @php($k++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--Store--}}
    <div class="modal fade" id="exampleModalCenterStore" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <form action="{{ route('dashboard.category_vacancy.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                            <div class="row">
                                <label for="" class="form-label">Название RU</label>
                                <input name="name_ru" class="form-control">
                            </div>
                            <div class="row">
                                <label for="" class="form-label">Название UZ</label>
                                <input name="name_uz" class="form-control">
                            </div>
                            <div class="row">
                                <label for="" class="form-label">Название EN</label>
                                <input name="name_en" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить вакансию</h5>
                </div>
                <form action="{{ route('dashboard.vacancies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Категория</label>
                                    <div class="col-12 text-center">
                                        <select name="category_id" id="" class="form-select">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->wordName->word_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Действия над категориями</label>
                                   <div>
                                       <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenterIndex">Лист</button>
                                       <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenterStore">Добавить</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото проекта</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="image" style="height: 100px; width: 100px"></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_ru"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_uz"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Обязанности EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="responsibility_en"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_ru"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_uz"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Требования EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="requirement_en"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_ru"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_uz"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Условия EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="condition_en"></textarea>
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
