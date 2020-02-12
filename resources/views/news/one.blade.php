@extends('layouts.main')

@section('content')
    <article class="news__item">
        <h1>{{ $news['title'] }}</h1>
        <p>{{ $news['text'] }}</p>
    </article>
@endsection