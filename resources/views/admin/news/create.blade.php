@extends('layouts.admin')

@section('content')
    <h1>Добавить новость</h1>

    <form method="POST" action="{{ route('admin.news.create') }}">
        @csrf

        <label>Категория:
            <select name="category_id">
                <option value="0">Выберите категорию</option>
                @foreach($categories as $item)
                    <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                @endforeach
            </select>
        </label>

        <label>Название: <input type="text" name="title"></label>

        <label>Описание: <textarea name="text" id="text" cols="30" rows="10"></textarea></label>

        <button type="submit">Сохранить</button>

    </form>

@endsection