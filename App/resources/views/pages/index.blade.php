@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rechercher des objets par catégorie</div>

                <div class="card-body">
                    <form method="POST" action="/post/search" aria-label="">
                        @csrf

                        <div class="form-group row">
                            <label for="tags"class="col-md-4 col-form-label text-md-right">Catégories : </label>
                            <select name="tags" class="form-control col-md-6" id="tags">
                                @foreach($tags as $k => $tag)
                                <option value="{{$k}}">{{$tag}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Rechercher') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
<h5>Le principe est simple : </h5>
<p>Se connecter ou creer un compte.</p>
<p>Creer un nouveau post et inclure <b>Donne</b> dans le titre de l'objet que l'on souhaite donner.</p>
<p>Si on recherche un objet ? Inclure <b>Recherche</b> suivi du nom de l'objet.</p>
</div>
<hr>
<div class="container">
  <h1>Nouveaux dons & annonces</h1>
  <div class="card-deck">
  @foreach ($posts as $post)
  <div class="card mb-5">
    <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
     @foreach($post->tags as $tag)
     <span class="badge badge-primary">{{$tag->name}}</span>
     @endforeach
   </div>
   <div class="card-body">
    <p class="card-text">{{ $post->content }}</p>
  </div>
  <div class="card-footer">
  <small class="text-muted">Posted by {{ $post->author }} at {{ $post->created_at}}</small>
    @if ($post->updated_at !=  $post->created_at )
    <small class="text-muted">Updated at {{ $post->updated_at}}</small>
    @endif
    @auth
    @if ($post->author ==  Auth::user()->name )
    <a href="/post/delete/{{$post->id}}" class="btn btn-danger" role="button">Delete</a>
    <a href="/post/update/{{$post->id}}" class="btn btn-primary" role="button">Update</a>
    @endif
    @endauth
    <a href="/post/show/{{$post->id}}" class="btn btn-success" role="button">Show</a>
  </div>
</div>
@endforeach
</div>
</div>

@endsection

