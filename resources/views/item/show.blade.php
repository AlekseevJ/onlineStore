@extends('master')
@section('papy')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card" style="width: 36rem;" >
        <img src="{{$item->image}}" class="card-img-top"  alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$item->name}}</h5>
          <p class="card-text">{{$item->desc}}</p>
          <p class="card-text">{{$item->price}}</p>
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Загрузка...</span>
          </div>
          <a href="{{route('item.edit',$item)}}" class="btn btn-primary">Изменить</a>
        </div>
        
@endsection
      