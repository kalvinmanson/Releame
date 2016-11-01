@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
    <h1>{{ $page->name }}</h1>
    <p>{{ $page->fields->where('name', 'CampoPrueba')->first()->content or 'no field' }}</p>
    {!! $page->content !!}
@endsection