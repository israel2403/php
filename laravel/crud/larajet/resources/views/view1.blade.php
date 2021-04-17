@extends('layouts.parent-view')

@section('main-contain')
    <h2>Contenido de la vista 1</h2>
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @php
    echo 'Esto es un texto de prueba';
    @endphp
    <ul>
        @for ($i = 0; $i <= 10; $i++)
            <li>El valor de i es: {{ $i }}</li>
        @endfor
    </ul>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>

    @if (count($users) === 1)
        <span class="badge bg-primary">Hay un solo elemento en el arreglo</span>
    @elseif (count($users) > 1)
        <span class="badge bg-success">Hay muchos elementos en el arreglo</span>
    @else
        <span class="badge bg-danger">No hay elementos</span>
    @endif
@endsection
