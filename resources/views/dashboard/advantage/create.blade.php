@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить преимущество</h5>
                </div>
                <form action="{{ route('dashboard.advantages.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото</label>
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
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_en">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Пункты | <button class="btn btn-xs btn-success" onclick="add()" type="button">+</button></h5>
                        <input type="hidden" id="0">
                        <div class="row">
                            <div class="rooms">

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
    <script>
        let id = $('#id').val();
        function add() {
            $('.rooms').append(
                '<div class="row mt-2" id="'+id+'">\n' +
                    '<div class="col-md-3">\n' +
                        '<label class="form-label">Название RU</label>\n' +
                        '<input class="form-control" type="text" name="item_ru[]" required>\n' +
                    '</div>\n' +
                    '<div class="col-md-3">\n' +
                        '<label class="form-label">Название UZ</label>\n' +
                        '<input class="form-control" type="text" name="item_uz[]" required>\n' +
                    '</div>\n' +
                    '<div class="col-md-3">\n' +
                        '<label class="form-label">Название EN</label>\n' +
                        '<input class="form-control" type="text" name="item_en[]" required>\n' +
                    '</div>\n' +
                    '<div class="col-md-1 mt-1">\n' +
                        '<div class="row mt-4">\n' +
                            '<button class="btn btn-danger" onclick="remove('+id+')" type="button">-</button>\n' +
                        '</div>\n' +
                    '</div>\n' +
                '</div>')
            id++;
        }
        function remove(id) {
            $('#'+id).remove();
        }

    </script>
@endsection