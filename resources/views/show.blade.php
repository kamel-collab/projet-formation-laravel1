@extends('template')
@section('content')
    <div class="card">
        <header class="card-header">
            <h4>Titre : {{ $film->title }}<h4>
        </header>
        <div class="card-body">

            <p>Année de sortie : {{ $film->year }}</p>
            <hr>
            <p>{{ $film->description }}</p>

        </div>
    </div>
@endsection
