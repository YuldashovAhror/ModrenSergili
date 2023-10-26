@extends('layouts.dashboard.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить место поблизости</h5>
                </div>
                <form action="{{ route('dashboard.places_nearby.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="hidden" name="project_id" value="{{ \Request::segment(3) }}">
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
                                <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Название En</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en">
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все места поблизости</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Название RU</th>
                            <th scope="col">Название UZ</th>
                            <th scope="col">Название EN</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($k=1)
                        @if($placesNearby)
                        @forelse($placesNearby as $placeNearby)
                            <tr>
                                <th scope="row">{{ $k }}</th>
                                <td><img src="{{ $placeNearby->photo->img }}" alt="" style="height: 200px; width: 200px"></td>
                                <td>{{ $placeNearby->wordName->word_ru }}</td>
                                <td>{{ $placeNearby->wordName->word_uz }}</td>
                                <td>{{ $placeNearby->wordName->word_en }}</td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $placeNearby->id }}Edit"><i data-feather="edit-2"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $placeNearby->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"  style="width: 40vw">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Изменить</h5>
                                                </div>
                                                <div class="modal-body" >
                                                    <form action="{{ route('dashboard.places_nearby.update', $placeNearby) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('put') }}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Фото</label>
                                                                        <div class="col-12 text-center">
                                                                            <img style="height: 200px; width: 200px" src="{{ $placeNearby->photo->img }}">
                                                                        </div>
                                                                        <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" value="{{ $placeNearby->wordName->word_ru }}">
                                                                </div>
                                                                <div class="col-4">
                                                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" value="{{ $placeNearby->wordName->word_uz }}">
                                                                </div>
                                                                <div class="col-4">
                                                                    <label class="form-label" for="exampleFormControlInput1">Название En</label>
                                                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" value="{{ $placeNearby->wordName->word_en }}">
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
                                    </div>

                                    <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $placeNearby->id }}"><i data-feather="trash"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $placeNearby->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Удалить?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('dashboard.places_nearby.destroy', $placeNearby) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                    </form>
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php($k++)
                        @empty
                        @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
