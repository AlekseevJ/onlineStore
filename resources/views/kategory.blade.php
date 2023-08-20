@extends('master')
@section('papy')
<ul class="list-group">
   @foreach ($cat as $item)
       

    <li class="list-group-item">{{$item->title}}
    <p>{{$item->desc}}</p><img src='{{$item->image}}'width='80'>
  <a href="{{route('categoryin',$item->url)}}"> IN</a></li>
    @endforeach
  </ul>
@endsection