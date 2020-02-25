@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
    <h1>Новости категории {{ $category['title'] }}</h1>

    <section class="news">
        @forelse($news as $item)
            <article class="news__item">
                <h2><a href="{{ route('news.newsOne', ['id' => $item['id']]) }}">{{ $item['title'] }}</a></h2>
            </article>
        @empty
            <div class="news__item">
                <h2>Нет новостей</h2>
            </div>
        @endforelse
    </section>

@endsection