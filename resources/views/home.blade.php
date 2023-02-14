@extends('layouts.main-layout')
@section('content')
<h1>CATEGORIES AND PRODUCTS</h1>
<ul>
    @foreach ($categories as $category)
    <h1>{{$category -> name}}</h1>
    @foreach ($category -> products as $product)
    <li>
        <strong>Product Name : </strong> {{$product -> name}} -- <strong>Digital : </strong> {{$product -> typology ->
        digital ? "Yes" : "No"}}
    </li>
    @endforeach
    <hr>
    @endforeach
</ul>
@endsection