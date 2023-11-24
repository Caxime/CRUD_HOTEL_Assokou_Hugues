<!-- resources/views/chambres/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Liste des Chambres</h2>

            <!-- Afficher la liste des chambres ici -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Statut</th>
                    <!-- Ajoutez d'autres colonnes en fonction de votre modèle -->
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- Afficher les données de la chambre ici -->
                </tbody>
            </table>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
@endsection
