@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все преимущества</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('dashboard.advantages.create', $project_id) }}"><button class="btn btn-warning">Добавить</button></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($k=1)

                            @forelse($advantages as $advantage)
                                <tr>
                                    <th scope="row">{{ $k }}</th>
                                    <td><img @if($advantage->img)src="{{ $advantage->img->img }}"@endif alt="" style="height: 100px; width: 200px"></td>
                                    <td>{{ $advantage->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('dashboard.advantages.edit', $advantage) }}">
                                            <button class="btn btn-xs btn-success">
                                                <i data-feather="edit-2"></i>
                                            </button>
                                        </a>
                                        <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $advantage->id }}"><i data-feather="trash"></i></button>
                                        <div class="modal fade" id="exampleModalCenter{{ $advantage->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('dashboard.advantages.destroy', $advantage->id) }}" method="post">
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection