@extends('app')

@section('content')
@if(request()->route()->getName() !== 'home')
  {{ Breadcrumbs::render('list', $current) }}
@endif

@isset($current)
  <div class="position-relative" style="height: calc(100vh - 122px)">
    <img class="position-absolute w-100 top-0 left-0 " style="object-fit: cover" src="{{ asset("images/categories/{$current->slug}/hero.jpg") }}" alt="">
    <h1 class="position-absolute top-50 left-50">{{ $current->name }}</h1>
  </div>
@endisset
<div class="container">
  <div class="row">
    @foreach($list as $item)
      <div class="col-12 col-md-4 g-3">
        <div class="card">
          <img src="{{ asset("images/categories/{$item->slug}/hero.jpg") }}" class="card-img-top" style="max-height: 236px;" alt="{{ $item->name }}" loading="lazy" decodinc="async">
          <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p>{{ $item->path() }}</p>
            <a href="{{ $item->path() }}" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
