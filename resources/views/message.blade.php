@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Contacter le vendeur </h1>
		<form action="{{ route('message.store')}}" method="POST" class="col-md-8 ml-5">
			@csrf
			<div class="form-group">
				<label for="content">Votre message</label>
				<textarea name="content" id="content" class="form-control"></textarea>
			</div>
			<input type="hidden" name="seller_id" value="{{$seller_id}}">
			<input type="hidden" name="ad_id" value="{{$ad_id}}">
			<input type="hidden" name="buyer_id" value="{{ auth()->user()->id }}">
			<button type="submit" class="btn btn-success">Envoyer le message</button>
		</form>
	</div>
@endsection