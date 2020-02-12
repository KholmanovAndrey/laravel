@extends('layouts.main')

@section('content')
    <h1>Категории новостей сайта</h1>

    <section class="news">
        <?php
        foreach ($categories as $item) {
        ?>
        <article class="news__item">
            <h2><a href="/news/category/{{ $item['id'] }}">{{ $item['title'] }}</a></h2>
        </article>
        <?php
        }
        ?>
    </section>

@endsection