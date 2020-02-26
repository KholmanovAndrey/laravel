@extends('layouts.app')

@section('title')
    {{ $news['title'] }}
@endsection

@section('content')
    <div class="container">
        <div class="news row justify-content-center">
            <article class="news__item col-md-12">
                <div class="card">
                    <div class="card-header"><h1>{{ $news['title'] }}</h1></div>
                    <div class="card-body">
                        <p>{{ $news['text'] }}</p>
                        <a href="{{ route('news.categoryId', ['id' => $category['name']]) }}">Категория: {{ $category['title'] }}</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection