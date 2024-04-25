@extends('layouts.app')
@section('content')
    <div class="card">
        <header class="card-header">
            <h4>Titre : {{ $film->title }}<h4>
        </header>
        <div class="card-body">

            <p>Année de sortie : {{ $film->year }}</p>
            <hr>
            <p>{{ $film->description }}</p>
            <hr>
            <p>{{ $film->category->name }}</p>
            <hr>
            <p>acteurs</p>
            <ul>
                @foreach ($film->actors as $a)
                    <li>{{ $a->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
