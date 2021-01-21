@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
        <alert class="alert alert-success">
            {{ session()->get('success')}}
        </alert>
    @endif
    <h1>Liste Des Annonces</h1>
    
@endsection