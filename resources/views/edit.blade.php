@extends('template')
@section('content')
    <div class="card">
        <header class="card-header">
            <h4>Création d'un film</h4>
        </header>
        <div class="card-body">

            <form action="{{ route('films.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Titre</label>
                    <div class="control">
                        <input class="form-control" type="text" name="title" value="{{ old('title') }}"
                            placeholder="Titre du film">
                    </div>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Année de diffusion</label>
                    <div class="control">
                        <input class="form-control" type="number" name="year" value="{{ old('year') }}" min="1950"
                            max="{{ date('Y') }}">
                    </div>
                    @error('year')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea class="form-control" name="description" placeholder="Description du film">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
