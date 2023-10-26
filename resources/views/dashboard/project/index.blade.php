@extends('layouts.dashboard.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Все проекты</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Название</th>
                        <th scope="col" class="text-center">Слайдер</th>
                        <th scope="col" class="text-center">Преимущества</th>
                        <th scope="col" class="text-center">Блоки</th>
                        <th scope="col" class="text-center">Места поблизости</th>
                        <th scope="col" class="text-center">Галереи</th>
                        <th scope="col" class="text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($k=1)
                    @foreach($projects as $project)
                        <tr>
                            <th scope="row">{{ $k }}</th>
                            <td><img src="{{ $project->imgMain->img }}" alt="" style="height: 100px; width: 200px"></td>
                            <td>{{ $project->name }}</td>
                            <td class="text-center"><a href="{{ route('dashboard.project.sliders', $project) }}"><button class="btn btn-xs btn-success"><i data-feather="chevrons-right"></i></button></a></td>
                            <td class="text-center"><a href="{{ route('dashboard.project.advantages', $project) }}"><button class="btn btn-xs btn-success"><i data-feather="star"></i></button></a></td>
                            <td class="text-center"><a href="{{ route('dashboard.project.buildings', $project) }}"><button class="btn btn-xs btn-success"><i data-feather="grid"></i></button></a></td>
                            <td class="text-center"><a href="{{ route('dashboard.project.places_nearby', $project) }}"><button class="btn btn-xs btn-success"><i data-feather="map-pin"></i></button></a></td>
                            <td class="text-center"><a href="{{ route('dashboard.project.gallery', $project) }}"><button class="btn btn-xs btn-success"><i data-feather="chevrons-right"></i></button></a></td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.projects.edit', $project) }}">
                                    <button class="btn btn-xs btn-success">
                                        <i data-feather="edit-2"></i>
                                    </button>
                                </a>
                                <button class="btn btn-xs btn-danger"><i data-feather="trash"></i></button>
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
@endsection
