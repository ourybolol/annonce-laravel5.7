@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" class="col-lg-8" action="{{route('ad.store')}}"> 
@csrf
  <div class="form-group">
    <label for="title">Titre de l'annonce</label>
    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " id="title" name="title">
    @if($errors->has('title'))
        <span class="invalid-feedback">
            {{$errors->first('title')}}
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="description">Description de l'annonce</label>
    <textarea id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" name="description"></textarea>
    @if($errors->has('description'))
        <span class="invalid-feedback">
            {{$errors->first('description')}}
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="localisation">Localisation</label>
    <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }} " id="localisation" name="localisation">
    @if($errors->has('localisation'))
        <span class="invalid-feedback">
            {{$errors->first('localisation')}}
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="price">Prix</label>
    <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }} " id="price" name="price">
    @if($errors->has('price'))
        <span class="invalid-feedback">
            {{$errors->first('price')}}
        </span>
    @endif

  </div>

  @guest
    <h1>Vos informations </h1>
    <hr/>
    <div class="form-group">
      <label for="name">Votre Nom</label>
      <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name">
      @if($errors->has('name'))
        <span class="invalid-feedback">
            {{$errors->first('name')}}
        </span>
    @endif
    </div>
    <div class="form-group">
      <label for="email">Votre email</label>
      <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email">
      @if($errors->has('email'))
        <span class="invalid-feedback">
            {{$errors->first('email')}}
        </span>
    @endif
    </div>
    <div class="form-group">
      <label for="password">Votre Mot de passe</label>
      <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password">
      @if($errors->has('password'))
        <span class="invalid-feedback">
            {{$errors->first('password')}}
        </span>
    @endif
    </div>
    <div class="form-group">
      <label for="password_confirmation">confirmer Mot de passe</label>
      <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}} " id="password_confirmation" name="password_confirmation">
      @if($errors->has('password_confirmation'))
        <span class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </span>
    @endif
    </div>

  @endguest
  <button type="submit" class="btn btn-primary">Soumettre notre annonce</button>    
</form>
</div>
@endsection