@extends('layouts.main')

@section('title', 'Create a product')

@section('content')

    <section class="grid place-items-center h-screen bg-gray-400">
        <form method="POST" action="{{ route('product.store') }}" class="bg-gray-200 gap-2 flex flex-col card card-body shadow card-bordered">
            <h1 class="card-title font-black text-xl mb-4">Create your product</h1>

            @csrf

            <label class="label label-text font-semibold text-gray-600" for="product-title">Product title</label>
            <input name="title" id="product-title" type="text" class="input input-primary" placeholder="Product title" />
            
            <label class="label label-text font-semibold text-gray-600" for="product-description">Product description</label>
            <textarea name="description" id="product-description" class="textarea textarea-primary" placeholder="Product description"></textarea>
            <input class="btn btn-primary" type="submit" value="Create" />
        </form>
    </section>

@endsection