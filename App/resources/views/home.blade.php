@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté! 
                    <p>Bonjour {{ Auth::user()->name }} !</p>
                    <h5>Donnez des objets qui ne vous servent plus pour gagner de l'XP</h5>
                    <small>Un objet donné vaut 25xp</small>
                    <!-- Lvl bar -->
                    <h5>Niveau : </h5>
                    <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <!-- lvl bar end  -->
                    <!-- If the xp is 100 show the buttons for leveling up or exchange for virtual money -->
                    <div class="dropdown-divider"></div>
                    <a href="/reward" name="xp" id="xp" class="btn btn-warning" role="button">Level UP !</a>
                    <a href="/reward" name="briques" id="briques" class="btn btn-success" role="button">BRIQUES !</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
