@extends('layout')
@section('title', 'Portfolio')
@section('content')
    <h1>Portfolio</h1>
    <ul>

        @forelse ($portfolio as $portfolioItem)
            <li>{{ $portfolioItem['title'] }} <small> {{ $loop->last ? 'Es el último': '' }}</small> </li>
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
    </ul>
@endsection
