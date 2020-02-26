@extends('layouts.app')

@section('title')
    Новости
@endsection

@section('content')
    <div class="container">
        <div class="news row justify-content-center">
            <h1>Новости</h1>
            @forelse($news as $item)
                <article class="news__item col-md-12">
                    <div class="card">
                        <div class="card-header">{{ $item['title'] }}</div>
                        <div class="card-body">
                            <a href="{{ route('news.newsOne', ['id' => $item['id']]) }}">Подробнее</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="news__item">
                    <h2>Нет новостей</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection