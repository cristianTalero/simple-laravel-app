@extends('layouts.main')

@section('title', 'Your product')

@section('content')

<h1>Title: {{ $product->title }}</h1>
<p>Description: {{ $product->description }}</p>

@endsection