@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все планировки</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('dashboard.plans.create', $building_id) }}"><button class="btn btn-warning">Добавить</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                        <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
                            {{--Recidence--}}
                            @foreach($rooms as $key=>$room)
                                <li class="nav-item"><a class="nav-link @if($key == 1) active @endif" id="pills-clrhome-tab{{ $key }}" data-bs-toggle="pill" href="#pills-clrhome{{ $key }}" role="tab" aria-controls="pills-clrhome1" aria-selected="false">{{ $room }}</a></li>
                            @endforeach
                            {{--End Recidence--}}

                            {{--Commercial--}}
                            <li class="nav-item"><a class="nav-link" id="pills-clrhome-tabCommercial" data-bs-toggle="pill" href="#pills-clrhomeCommercial" role="tab" aria-controls="pills-clrhome1" aria-selected="false">Коммерческие</a></li>
                            {{--End Commercial--}}
                        </ul>
                        <div class="tab-content" id="pills-clrtabContent1">
                            {{--Recidence--}}
                            @foreach($rooms as $key=>$room)
                                <div class="tab-pane fade @if($key == 1) active show @endif" id="pills-clrhome{{ $key }}" role="tabpanel" aria-labelledby="pills-clrhome-tab{{ $key }}">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Фото план</th>
                                            <th scope="col">Фото 3d</th>
                                            <th scope="col">Название</th>
                                            <th scope="col" class="text-center">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($k=1)
                                        @forelse($plans->where('type', 'residential')->where('number_of_rooms', $key) as $plan)
                                            <tr>
                                                <th scope="row">{{ $k }}</th>
                                                <td><img @if($plan->imgMain)src="{{ $plan->imgMain->img }}"@endif alt="" style="height: 100px; width: 200px; object-fit: contain"></td>
                                                <td><img @if($plan->img3d)src="{{ $plan->img3d->img }}"@endif alt="" style="height: 100px; width: 200px; object-fit: contain"></td>
                                                <td>{{ $plan->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('dashboard.plans.edit', $plan) }}">
                                                        <button class="btn btn-xs btn-success">
                                                            <i data-feather="edit-2"></i>
                                                        </button>
                                                    </a>
                                                    <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $plan->id }}"><i data-feather="trash"></i></button>
                                                    <div class="modal fade" id="exampleModalCenter{{ $plan->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Удалить?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('dashboard.plans.destroy', $plan->id) }}" method="post">
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
                                            <tr>
                                                <th scope="row">Пока нет планировок</th>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            {{--End Recidence--}}

                            {{--Commercial--}}
                            <div class="tab-pane fade" id="pills-clrhomeCommercial" role="tabpanel" aria-labelledby="pills-clrhome-tabCommercial">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Фото план</th>
                                        <th scope="col">Фото 3d</th>
                                        <th scope="col">Название</th>
                                        <th scope="col" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($k=1)
                                    @foreach($plans->where('type', 'commercial') as $plan)
                                        <tr>
                                            <th scope="row">{{ $k }}</th>
                                            <td><img @if($plan->imgMain)src="{{ $plan->imgMain->img }}"@endif alt="" style="height: 100px; width: 200px; object-fit: contain"></td>
                                            <td><img @if($plan->img3d)src="{{ $plan->img3d->img }}"@endif alt="" style="height: 100px; width: 200px; object-fit: contain"></td>
                                            <td>{{ $plan->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.plans.edit', $plan) }}">
                                                    <button class="btn btn-xs btn-success">
                                                        <i data-feather="edit-2"></i>
                                                    </button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $plan->id }}"><i data-feather="trash"></i></button>
                                                <div class="modal fade" id="exampleModalCenter{{ $plan->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('dashboard.plans.destroy', $plan->id) }}" method="post">
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
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{--End Commercial--}}
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection

