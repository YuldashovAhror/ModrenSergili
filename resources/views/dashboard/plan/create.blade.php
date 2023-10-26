@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить планировку</h5>
                </div>
                <form action="{{ route('dashboard.plans.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row" id="div__type">
                            <div class="row" id="residential">
                                <div class="col-6">
                                    <label class="form-label">Тип планировки</label>
                                    <select name="type" id="type" class="form-control" onchange="change()">
                                        <option value="residential">Жилой</option>
                                        <option value="commercial">Коммерческий</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Количество комнат</label>
                                    <input class="form-control" type="number" name="number_of_rooms" min="1" max="5" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <input type="hidden" name="building_id" value="{{ $building_id }}">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото план</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="image" style="height: 100px; width: 100px"></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo_plan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото 3d</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="map" style="height: 100px; width: 100px"></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo_3d">
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Цена От</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="price_from">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Площадь</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="total_area">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Комнаты | <button class="btn btn-xs btn-success" onclick="add()" type="button">+</button></h5>
                        <input type="hidden" id="id" value="0">
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
        function change()
        {
           type = $('#type').val();

            if(type == 'commercial') {
                $('#residential').remove()
                $('#div__type').append(
                    '<div id="commercial">'+
                        '<div class="col-12">'+
                            '<label class="form-label">Тип планировки</label>'+
                            '<select name="type" id="type" class="form-control" onchange="change()">'+
                                '<option value="residential" >Жилой</option>'+
                                '<option value="commercial" selected>Коммерческий</option>'+
                            '</select>'+
                        '</div>'+
                    '</div>')
            }else{
                $('#commercial').remove()
                $('#div__type').append(
                    '<div class="row" id="residential">'+
                       ' <div class="col-6">'+
                            '<label class="form-label">Тип планировки</label>'+
                           ' <select name="type" id="type" class="form-control" onchange="change()">'+
                                '<option value="residential">Жилой</option>'+
                               ' <option value="commercial">Коммерческий</option>'+
                            '</select>'+
                       ' </div>'+
                        '<div class="col-6">'+
                            '<label class="form-label">Количество комнат</label>'+
                           ' <input class="form-control" type="number" name="number_of_count" min="1" max="5" value="1">'+
                        '</div>'+
                    '</div>')
            }
        }
    </script>
    <script>
        let id = $('#id').val();
        function add() {
            $('.rooms').append(
                '<div class="row mt-2" id="'+id+'">\n' +
                    '<div class="col-md-8">\n' +
                        '<label class="form-label">Название</label>\n' +
                        '<input class="form-control" type="text" name="rooms['+id+'][name]" required>\n' +
                    '</div>\n' +
                    '<div class="col-md-3">\n' +
                        '<label class="form-label">Площадь</label>\n' +
                        '<input class="form-control" type="text" name="rooms['+id+'][area]" required>\n' +
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
