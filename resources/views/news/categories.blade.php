@extends('layouts.app')

@section('title')
    Категории новостей
@endsection

@section('content')
    <div class="container">
        <div class="news row justify-content-center">
            <h1>Категории новостей</h1>
            @forelse($categories as $item)
                <article class="news__item col-md-12">
                    <div class="card">
                        <div class="card-header"> <h2><a href="{{ route('news.categoryId', ['id' => $item['name']]) }}">{{ $item['title'] }}</a></h2></div>
                    </div>
                </article>
            @empty
                <div class="news__item">
                    <h2>Нет категории</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection