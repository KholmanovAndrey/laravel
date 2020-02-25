@extends('layouts.main')

@section('title')
    {{ $news['title'] }}
@endsection

@section('content')
    <article class="news__item">
        <h1>{{ $news['title'] }}</h1>
        <p>{{ $news['text'] }}</p>
        <a href="{{ route('news.categoryId', ['id' => $category['name']]) }}">Категория: {{ $category['title'] }}</a>
    </article>
@endsection