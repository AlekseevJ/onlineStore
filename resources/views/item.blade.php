@extends('master')
@section('papy')
<div class="row row-cols-1 row-cols-md-1 g-4" >
@foreach ($item as $item1)


<div class="card h-100" style="width: 18rem;">
  <img src="{{$item1->image}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$item1->name}}</h5>
    <p class="card-text">{{$item1->price}}</p>
    <p class="card-text">{{$item1->desc}}</p>
    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
  </div>
</div>

@endforeach
</div>
@endsection