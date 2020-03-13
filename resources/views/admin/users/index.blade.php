@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Список пользователей</h1>
        <a class="btn btn-warning" href="{{ route('admin.user.create') }}">Добавить</a>
        <section class="items">
            @forelse($users as $item)
                <article class="items__item">
                    <h2>{{ $item->name }}</h2>
                    <a class="btn btn-success" href="{{ route('admin.user.update', $item) }}">Редактировать</a>
                    <a class="btn btn-danger" href="{{ route('admin.user.delete', $item) }}">Удалить</a>
                </article>
            @empty
                <div class="items__item">
                    <h2>Нет пользователей</h2>
                </div>
            @endforelse
        </section>
    </div>
@endsection