@extends('layouts.main-layout')
@section('content')
<h1>ALL PRODUCTS</h1>
<ul>
    @foreach ($products as $product)
    <h1>{{$product -> name}}</h1>
    <hr>
    @endforeach
</ul>
@endsection