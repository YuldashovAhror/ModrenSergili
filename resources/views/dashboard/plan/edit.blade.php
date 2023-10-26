@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Изменить планировку</h5>
                </div>
                <form action="{{ route('dashboard.plans.update', $plan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <input type="hidden" name="building_id" value="{{ $plan->building_id }}">
                    <div class="card-body">
                        @if($plan->type == 'residential')
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Количество комнат</label>
                                    <input class="form-control" type="number" name="number_of_rooms" min="1" max="5" value="{{ $plan->number_of_rooms }}">
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото план</label>
                                    <div class="col-12 text-center">
                                        <img @if($plan->imgMain)src="{{ $plan->imgMain->img }}"@endif style="height: 300px; width: 300px">
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo_plan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото 3d</label>
                                    <div class="col-12 text-center">
                                        <img @if($plan->img3d)src="{{ $plan->img3d->img }}"@endif style="height: 300px; width: 300px">
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo_3d">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" value="{{ $plan->wordName->word_ru }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" value="{{ $plan->wordName->word_uz }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" value="{{ $plan->wordName->word_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Цена От</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="price_from" value="{{ $plan->price_from }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Площадь</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="total_area" value="{{ $plan->area }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Комнаты | <button class="btn btn-xs btn-success" onclick="add()" type="button">+</button></h5>
                        <input type="hidden"  @if(!empty($plan->rooms)) value="{{ count($plan->rooms) }}" @else value="0" @endif id="id">
                        <div class="row">
                            <div class="rooms">
                                @if(!empty($plan->rooms))
                                    @foreach($plan->rooms as $key=>$room)
                                        <div class="row mt-2" id="{{ $key }}">
                                            <div class="col-md-8">
                                                <label class="form-label">Название</label>
                                                <input class="form-control" type="text" name="rooms[{{ $key }}][name]" value="{{ $room['name'] }}" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Площадь</label>
                                                <input class="form-control" type="text" name="rooms[{{ $key }}][area]" value="{{ $room['area'] }}" required>
                                            </div>
                                            <div class="col-md-1 mt-1">
                                                <div class="row  mt-4">
                                                    <button class="btn btn-danger" onclick="remove({{ $key }})" type="button">-</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
