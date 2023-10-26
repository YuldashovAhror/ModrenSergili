@extends('layouts.dashboard.main')

@section('content')
    <?php
        $types = [ 1 => 'Новости', 2 => 'Акции'];
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Лист</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @foreach($types as $key=>$value)
                            <li class="nav-item @if($key == 1) active @endif"><a class="nav-link @if($key == 1) active @endif" id="{{ $value }}-tab" data-bs-toggle="pill" href="#{{ $value }}" role="tab" aria-controls="pills-home" aria-selected="false">{{ $value }}<div class="media"></div></a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($types as $key=>$value)
                            <div class="tab-pane fade @if($key == 1) active show @endif" id="{{ $value }}" role="tabpanel" aria-labelledby="pills-home-tab" >
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
                                        @foreach($newPromotions->where('type', $key) as $data)
                                        <tr>
                                            <th scope="row">{{ $k }}</th>
                                            <td>
                                            @if (!empty($data->photo->img))
                                                <img src="{{ $data->photo->img }}" alt="" style="height: 100px; width: 200px"></td>
                                            @endif
                                            <td>{{ $data->title }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('dashboard.new_promotion.edit', $data) }}">
                                                    <button class="btn btn-xs btn-success">
                                                        <i data-feather="edit-2"></i>
                                                    </button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $data->id }}"><i data-feather="trash"></i></button>
                                            </td>
                                            <div class="modal fade" id="exampleModalCenter{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Удалить?</h5>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('dashboard.new_promotion.destroy', $data) }}" method="post">
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
