@extends('layouts.dashboard.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить партнера</h5>
                </div>
                <form action="{{ route('dashboard.partners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Логотип</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="image" style="height: 100px; width: 100px"></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="logo" required>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все партнеры</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Логотп</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($k=1)
                        @if($partners)
                            @forelse($partners as $partner)
                                <tr>
                                    <th scope="row">{{ $k }}</th>
                                    <td><img src="{{ $partner->logo }}" alt="" style="height: 200px; width: 200px"></td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $partner->id }}Edit"><i data-feather="edit-2"></i></button>
                                        <div class="modal fade" id="exampleModalCenter{{ $partner->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"  style="width: 40vw">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Изменить</h5>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <form action="{{ route('dashboard.partners.update', $partner) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="exampleFormControlInput1">Логотип</label>
                                                                            <div class="col-12 text-center">
                                                                                <img src="{{ $partner->logo }}" style="height: 100px; width: 100px">
                                                                            </div>
                                                                            <input class="form-control" id="exampleFormControlInput1" type="file" name="logo" required>
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
                                        </div>

                                        <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $partner->id }}"><i data-feather="trash"></i></button>
                                        <div class="modal fade" id="exampleModalCenter{{ $partner->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('dashboard.partners.destroy', $partner) }}" method="post">
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
