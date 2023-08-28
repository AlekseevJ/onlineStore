@extends('master')
@section('papy')

<table>
    <tr><th>Имя</th>
    <th>цена</th>
    <th> Картинка</th></tr>
    @if ($basket)
        
    
    @foreach ($basket->items as $item)
    <tr>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}</td>
    <td><img src="{{$item->image}}" width="50em" alt=""></td>
    
</tr>

    @endforeach
    @endif
</table>
      
   
    @endsection