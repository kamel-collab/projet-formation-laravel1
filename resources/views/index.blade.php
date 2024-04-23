@extends('template')
@section('content')
    <div class="card">
        <header class="card-header">
            <h3>Films</h3>
        </header>
        <div class="card-body">


            <table class="table is-hoverable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $f)
                        <tr>
                            <td> {{ $f->id }}</td>
                            <td> {{ $f->title }} </td>
                            <td><a class="btn btn-primary" href="{{route('films.show',$f->id)}}">Voir</a></td>
                            <td><a class="btn btn-warning" href="">Modifier</a></td>
                            <td><a class="btn btn-danger" href="">Supprimer</a></td>
  
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
