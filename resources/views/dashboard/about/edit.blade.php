@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Изменить</h5>
                </div>
                <form action="{{ route('dashboard.about.update', $about) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото О компании</label>
                                    <div class="col-12 text-center mb-3">
                                        @if (!empty($about->photo))
                                            <img src="{{ $about->photo }}" style="height: 100px; width: 100px">
                                        @endif
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Второй Фото О компании</label>
                                    <div class="col-12 text-center mb-3">
                                        @if (!empty($about->second_photo))
                                            <img src="{{ $about->second_photo }}" style="height: 100px; width: 100px">
                                        @endif
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="second_photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент RU</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_ru">{{ $about->description_ru }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент UZ</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_uz">{{ $about->description_uz }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Контент EN</label>
                                    <textarea class="ckeditor" rows="10" cols="80" name="description_en">{{ $about->description_en }}</textarea>
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
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
