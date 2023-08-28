@extends('master')
@section('papy')
    <form action="{{route('item.update',$item->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="category_id">Категория</label>
        <input type="text", name="category_id" value="{{$item->category_id}}">
@foreach ($hkategory as $kat)
<h5>{{$kat->id}} это  {{$kat->title}}</h1>    
@endforeach
        <label for="name">Имя</label>
        <input type="text", name="name" value="{{$item->name}}">

        <label for="price">Цена</label>
        <input type="text", name="price" value="{{$item->price}}">

        <label for="desc">Описание</label>
        <input type="text", name="desc" value="{{$item->desc}}">

        <label for="image">Ссылка на изображение</label>
        <input type="text", name="image" value="{{$item->image}}">
        <button type="submit">Подтвердить</button>
    </form>
    <form action="{{route('item.destroy', $item->id)}}" method="post">
        @csrf
        @method('delete')
    <button type="submit">Удали меня</button>
    </form>
@endsection