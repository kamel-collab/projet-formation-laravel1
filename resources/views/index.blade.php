@extends('layouts.app')
@section('content')
    @if (session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif
    <a class="btn btn-primary m-3" href="{{ route('films.create') }}">ajouter</a>
    <br>
    <div class="select">
        <select onchange="window.location.href=this.value" name="category_id" id="category_id">
            <option value="{{ route('films.index') }}" @unless ($slug) selected @endunless>Toutes
                catégories</option>

            @foreach ($categories as $c)
                <option value="{{ route('films.category', $c->slug) }}" {{ $c->slug == $slug ? 'selected' : '' }}>
                    {{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
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
                            <td><a class="btn btn-primary" href="{{ route('films.show', $f->id) }}">Voir</a></td>
                            <td><a class="btn btn-warning" href="{{ route('films.edit', $f->id) }}">Modifier</a></td>
                            <td>
                                <form action="{{ route('films.destroy', $f->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
