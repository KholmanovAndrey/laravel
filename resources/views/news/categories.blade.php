@extends('layouts.main')

@section('title')
    Категории новостей
@endsection

@section('content')
    <h1>Категории новостей </h1>

    <section class="news">
        @forelse($categories as $item)
            <article class="news__item">
                <h2><a href="{{ route('news.categoryId', ['id' => $item['name']]) }}">{{ $item['title'] }}</a></h2>
            </article>
        @empty
            <div class="news__item">
                <h2>Нет категории</h2>
            </div>
        @endforelse
    </section>

@endsection