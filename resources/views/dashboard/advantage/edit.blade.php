@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Изменить преимущество</h5>
                </div>
                <form action="{{ route('dashboard.advantages.update', $advantage) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="project_id" value="{{ $advantage->project_id }}">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото</label>
                                    <div class="col-12 text-center">
                                        <img src="{{ $advantage->img->img }}" style="height: 100px; width: 100px"></img>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_ru" value="{{ $advantage->wordTitle->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_uz" value="{{ $advantage->wordTitle->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Заголовок EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title_en" value="{{ $advantage->wordTitle->word_en }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Пункты | <button class="btn btn-xs btn-success" onclick="add()" type="button">+</button></h5>
                        <input type="hidden" id="id" value="{{ count($advantage->wordItem) }}">
                        <div class="row">
                            <div class="rooms">
                                @foreach($advantage->wordItem as $key=>$word)
                                    <div class="row mt-2" id="{{ $key }}">
                                        <div class="col-md-3">
                                            <label class="form-label">Название RU</label>
                                            <input class="form-control" type="text" name="item_ru[]" required value="{{ $word->word_ru }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Название UZ</label>
                                            <input class="form-control" type="text" name="item_uz[]" required value="{{ $word->word_uz }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Название EN</label>
                                            <input class="form-control" type="text" name="item_en[]" required value="{{ $word->word_en }}">
                                        </div>
                                        <div class="col-md-1 mt-1">
                                            <div class="row mt-4">
                                                <button class="btn btn-danger" onclick="remove({{ $key }})" type="button">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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