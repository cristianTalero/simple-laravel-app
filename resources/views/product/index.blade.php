@extends('layouts.main')

@section('title', 'Product')

@section('content')

<h1 class="font-black text-4xl p-6 pb-0">Your products</h1>

<span class="divider"></span>

<section class="flex flex-wrap gap-4 p-4">
    @foreach ($products as $product)
        <article class="flex flex-col items-center bg-gray-300 card card-body">
            <span class="card-title font-bold">{{ $product->title }}</span>
            <p class="text-lg font-light">{{ $product->description }}</p>
            
            @if ($product->published == 0)
                <span class="font-bold text-error">No publicado</span>
            @else
                <span class="font-bold text-success">Publicado</span>
            @endif

            <label for="published-toggle" class="sr-only">Published</label>
            <input {{ $product->published == 1 ? 'checked' : '' }} id="published-toggle" data-key={{ $product->id }} type="checkbox" class="toggle toggle-primary" />
        </article>
    @endforeach
</section>

<script type="text/javascript">
    
    const publishedToggles = document
        .querySelectorAll('input[type="checkbox"]')


    for (const publishedToggle of publishedToggles) {
        publishedToggle.addEventListener('change', async (e) => {
            e.preventDefault()
            
            await fetch('/api/product/published/' + publishedToggle.dataset.key, {
                method: 'PATCH',
                headers:{
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: e.target.checked })
            })


        })
    }

</script>

@endsection