@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Все вакансии</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @foreach($categories as $category)
                            <li class="nav-item @if($categories->first()->id == $category->id) active @endif"><a class="nav-link @if($categories->first()->id == $category->id) active @endif" id="{{ $category->name }}-tab" data-bs-toggle="pill" href="#{{ $category->name }}" role="tab" aria-controls="pills-home" aria-selected="false">{{ $category->wordName->word_ru }}<div class="media"></div></a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($categories as $category)
                            <div class="tab-pane fade @if($categories->first()->id == $category->id) active show @endif" id="{{ $category->name }}" role="tabpanel" aria-labelledby="pills-home-tab" >
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Фото</th>
                                        <th scope="col">Название</th>
                                        <th scope="col" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($k=1)
                                    @foreach($category->vacancies as $vacancy)
                                        <tr>
                                            <th scope="row">{{ $k }}</th>
                                            <td><img @if($vacancy->photo) src="{{ $vacancy->photo->img }}" @endif alt="" style="height: 100px; width: 200px"></td>
                                            <td>{{ $vacancy->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.vacancies.edit', $vacancy) }}">
                                                    <button class="btn btn-xs btn-success">
                                                        <i data-feather="edit-2"></i>
                                                    </button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $vacancy->id }}"><i data-feather="trash"></i></button>
                                            </td>
                                            <div class="modal fade" id="exampleModalCenter{{ $vacancy->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Удалить?</h5>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('dashboard.vacancies.destroy', $vacancy) }}" method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}
                                                                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                            </form>
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        @php($k++)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
