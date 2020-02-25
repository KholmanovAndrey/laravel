@extends('layouts.main')

@section('title')
    Контакты
@endsection

@section('content')
    <h1>Контакты</h1>

    <form method="POST" action="/profile">
        @csrf
        ...
    </form>

@endsection