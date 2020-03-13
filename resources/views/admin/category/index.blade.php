@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Список категории</h1>
        <a class="btn btn-warning" href="{{ route('admin.category.create') }}">Добавить</a>
        <section class="news">
            @forelse($categories as $item)
                <article class="news__item">
                    <h2>{{ $item->title }}</h2>
                    <a class="btn btn-success" href="{{ route('admin.category.update', $item) }}">Редактировать</a>
                    <a class="btn btn-danger" href="{{ route('admin.category.delete', $item) }}">Удалить</a>
                </article>
            @empty
                <div class="news__item">
                    <h2>Нет новостей</h2>
                </div>
            @endforelse
        </section>
    </div>
@endsection