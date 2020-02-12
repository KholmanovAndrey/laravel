@extends('layouts.main')

@section('content')
    <h1>Новости сайта</h1>

    <section class="news">
        <?php
        foreach ($news as $item) {
        ?>
        <article class="news__item">
            <h2><a href="{{ route('news.newsOne', ['id' => $item['id']]) }}">{{ $item['title'] }}</a></h2>
        </article>
        <?php
        }
        ?>
    </section>

@endsection