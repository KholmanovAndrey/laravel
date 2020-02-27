@extends('layouts.app')

@section('title')
    Контакты
@endsection

@section('content')
    <div class="container">
        <h1>Контакты</h1>

        <form method="POST" action="/profile">
            @csrf
            ...
        </form>
    </div>
@endsection