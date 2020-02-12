@extends('layouts.main')

@section('content')
    Контакты

    <form method="POST" action="/profile">
        @csrf
        ...
    </form>

@endsection