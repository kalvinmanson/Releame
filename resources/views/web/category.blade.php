@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
    <h1>{{ $category->name }}</h1>
    <hr>
    @foreach ($category->pages as $page)
    <h2>{{ $page->name }}</h2>
    <p>{{ $page->fields->where('name', 'CampoPrueba')->first()->content or 'no field' }}</p>
    @endforeach
@endsection