<!-- resources/views/chambres/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Enregistrement d'une chambre</h2>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('chambres.store') }}" method="post">
                @csrf
                <!-- Ajoutez les champs du formulaire ici selon votre modèle -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la chambre</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <!-- Ajoutez d'autres champs ici -->

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
