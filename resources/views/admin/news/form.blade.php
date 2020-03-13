@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if (!$news->id) Добавить новость@else Изменить новость@endif</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="@if (!$news->id){{ route('admin.news.create') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $news->title ?? old('title') }}" required autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>

                                <div class="col-md-6">
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                        <option value="0">Выберите категорию</option>
                                        @foreach($categories as $item)
                                            <option
                                                    @if (!$news->id)
                                                        @if ($item->id == old('category_id')) selected @endif
                                                    @else
                                                        @if ($item->id == $news->category_id) selected @endif
                                                    @endif
                                            value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="my-editor" class="col-md-4 col-form-label text-md-right">{{ __('Текст') }}</label>

                                <div class="col-md-6">
                                    <textarea name="text" id="my-editor" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror" required>{!! $news->text ?? old('text') !!}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Картинка') }}</label>

                                <div class="col-md-6">
                                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
@endsection