@extends('layouts.main-layout')
@section('content')
<h1>ALL PRODUCTS</h1>
<ul>
    @foreach ($products as $product)
    <h1>{{$product -> name}}</h1>
    <strong>Description : </strong> {{$product -> description}} <br>
    <strong>Price : </strong> {{$product -> price}} <br>
    <strong>Weight : </strong> {{$product -> weight}} <br>
    <strong>Typology : </strong> {{$product -> typology -> name}} <br>
    <strong>Digital : </strong> {{$product -> typology -> digital ? "Yes" : "No"}} <br>
    <hr>
    @endforeach
</ul>
@endsection