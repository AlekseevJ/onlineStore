@extends('master')
@section('papy')
    <form action="{{route('item.store')}}" method="post">
    @csrf
    <label for="name">Наименование</label>
    <input type="text" name="name" id="">
    <label for="price">Цена</label>
    <input type="text" name="price" id="">
    <label for="desc">описание</label>
    <input type="text" name="desc" id="">
    <label for="image">Ссылка на изображение</label>
    <input type="text" name="image" id="">
  
    <button type="submit">Создать</button>

    </form>
@endsection