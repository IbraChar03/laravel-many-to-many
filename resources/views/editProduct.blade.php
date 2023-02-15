@extends('layouts.main-layout')
@section('content')
<h1>EDIT PRODUCT</h1>
<form action="" method="POST">
    @include("components.errors")
    @csrf
    <label for="name">Name : </label>
    <input type="text" name="name" value="{{$product -> name}}"> <br> <br>

    <label for="description">Description : </label>
    <input type="text" name="description" value="{{$product -> description}}"> <br> <br>

    <label for="price">Price : </label>
    <input type="number" name="price" value="{{$product -> price}}"> <br> <br>

    <label for="weight">Weight : </label>
    <input type="number" name="weight" value="{{$product -> weight}}"> <br> <br>
    <label for="typology">Typology : </label>
    <select name="typology">
        @foreach ($typologies as $typology)
        <option value="{{$typology -> id}}" @if($product -> typology -> id == $typology -> id)
            selected
            @endif

            >{{$typology -> name}}

        </option>
        @endforeach


    </select> <br> <br>
    @foreach ($categories as $category)
    <input type="checkbox" name="categories[]" value="{{$category
        -> id }}" @foreach($product -> categories as $categoryProduct )
    @if($categoryProduct -> id == $category -> id)
    checked
    @endif
    @endforeach

    >
    <label for="categories">{{$category -> name}}</label> <br>
    @endforeach
    <br>
    <input type="submit" value="Edit">

</form>
@endsection
