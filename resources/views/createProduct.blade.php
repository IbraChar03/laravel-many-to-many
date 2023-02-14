@extends('layouts.main-layout')
@section('content')
<h1>CREATE A NEW PRODUCT</h1>
<form action=""
    method="POST">
    <label for="name">Name : </label>
    <input type="text"
        name="name"> <br> <br>

    <label for="description">Description : </label>
    <input type="text"
        name="description"> <br> <br>

    <label for="price">Price : </label>
    <input type="number"
        name="price"> <br> <br>

    <label for="weight">Weight : </label>
    <input type="number"
        name="weight"> <br> <br>
    <label for="typology">Typology : </label>
    <select name="typology"
        id="">
        @foreach ($typologies as $typology)
        <option value="{{$typology -> id}}">{{$typology -> name}}</option>
        @endforeach


    </select> <br> <br>
    <label for=""> <strong>Categories : </strong></label> <br>
    @foreach ($categories as $category)
    {{$category -> name}} <input type="checkbox"
        name="{{$category -> name}}"
        value={{$category
        -> id}}> <br>
    @endforeach
    <input type="submit"
        value="Create">

</form>
@endsection