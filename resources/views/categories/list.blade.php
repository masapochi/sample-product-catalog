@extends('app')

@section('content')
@if(request()->route()->getName() !== 'home')
  {{ Breadcrumbs::render('list', $current) }}
@endif

@isset($current)
  @include('partials.hero', ['current' => $current])

@else
  <div class="hero-container --top">
    <img class="hero-image w-100 h-100 img-fluid" src="https://fastly.picsum.photos/id/60/1920/1200.jpg?hmac=fAMNjl4E_sG_WNUjdU39Kald5QAHQMh-_-TsIbbeDNI" alt="">
    <div class="top-hero-title-container hero-title-container position-absolute shadow-lg " style="">
      <h1 class="text-white">Sample Product Catalog</h1>
      <p class="text-white mb-0">This is a dummy product catalog using "Lorem Ipsum".</p>
    </div>
  </div>
@endisset

<div class="container">
  <div class="row">
    @foreach($list as $item)
      @include('partials.card', ['item' => $item])
    @endforeach
  </div>
</div>
@endsection
