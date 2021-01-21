@extends('layouts.app')


@section('content')
<div class="container">
 <div class="row justify-content-center">
 	<div class="col-md-8">
 		<form action="{{route('ad.search')}}" method="POST" 
 			onsubmit="search(event)" id="searchForm">
 			@csrf
 			<div class="form-group">
 				<input type="text" name="" class="form-control" id="words">
 			</div>
 			<button type="submit" class="btn btn-primary">Rechercher</button>
 		</form>
 		<div id="results">
 			@foreach($ads as $ad)
				<div class="card" style="width: 100%;">
					  <img class="card-img-top" src="https://via.placeholder.com/300x100" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">{{$ad->title}}</h5>
					    <h6 class="card-subtitle mb-2 text-muted">{{$ad->localisation}}</h6>
					    <p class="card-text">{{$ad->description}}</p>
					    <a href="" class="card-link">Voir l'annonce</a>
					    <a href="{{ route('message.create', [' seller_id' => $ad->user_id,
					    	'ad_id' => $ad->id])}}" class="card-link">Contacter le vendeur</a>
					  </div>
					  <small class="ml-3">{{Carbon\Carbon::parse($ad->created_at)->diffForHumans()}}</small>
				</div>
			@endforeach	
 		</div>
	{{ $ads->links()}}
 	</div>
 </div>

 </div>
@endsection

@section('extra-js')
	<script type="text/javascript">
		function search(event){
			event.preventDefault(event);
			const words = document.querySelector('#words').value;
			const url = document.querySelector('#searchForm').getAttribute('action')
			axios.post(`${url}`, {
			    words: words,
			  })
			  .then(function (response) {
			    const ads = response.data.ads
			    let results = document.querySelector('#results')
			    results.innerHTML = ''

			    for(let i = 0; i< ads.length; i++){
			    	let card = document.createElement('div')
			    	let cardBody = document.createElement('div')
			    	card.classList.add('card', 'mb-3')
			    	cardBody.classList.add('card-body')

			    	let title = document.createElement('h5')
			    	title.classList.add('card-title')
			    	title.innerHTML = ads[i].title

			    	let description = document.createElement('p')
			    	description.classList.add('card-text')
			    	description.innerHTML = ads[i].description

			    	cardBody.appendChild(title)
			    	cardBody.appendChild(description)

			    	card.appendChild(cardBody)

			    	results.appendChild(card)
			    }
			  })
			  .catch(function (error) {
			    console.log(error);
			 });
		}
	</script>
@endsection