@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-5">
    <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}
    @foreach($post->tags as $tag)
     <span class="badge badge-primary">{{$tag->name}}</span>
     @endforeach
     </h5>
    <p class="card-text">{{ $post->content }}</p>
  </div>
  <div class="card-footer">
  <small class="text-muted">Posté par {{ $post->author }} le {{ $post->created_at}}</small>
    @if ($post->updated_at !=  $post->created_at )
    <small class="text-muted">Modifié le {{ $post->updated_at}}</small>
    @endif
    @auth
    @if ($post->author ==  Auth::user()->name )
    <a href="/post/delete/{{$post->id}}" class="btn btn-danger" role="button">Delete</a>
    <a href="/post/update/{{$post->id}}" class="btn btn-primary" role="button">Update</a>
    @endif
    @endauth
  </div>
    </div>
@auth
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">L'objet vous interesse ? Écrivez un commentaire </div>

                <div class="card-body">
                    <form method="POST" action="/comment/create/{{$post->id}}" aria-label="">
                        @csrf

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Commentaire') }}</label>

                            <div class="col-md-6">
                                <textarea id="content" class="form-control" name="content" rows="10" required style="resize:none;"></textarea>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
<h1>Commentaires</h1>
<hr>
@foreach ($comments as $comment)
                <div class="media mb-5">
                        <img class="mr-3" src="https://picsum.photos/50/50" alt="Generic placeholder image">
                            <div class="media-body">
                            <h5 class="mt-0">{{ $comment->author }} le {{ $comment->created_at}}</h5>
                            {{$comment->content}}
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection