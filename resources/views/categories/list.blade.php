@extends('app')

@section('content')
@if(request()->route()->getName() !== 'home')
  {{ Breadcrumbs::render('list', $current) }}
@endif

@isset($current)
  @include('partials.hero', ['current' => $current])
@endisset

<div class="container">
  <div class="row">
    @foreach($list as $item)
      @include('partials.card', ['item' => $item])
    @endforeach
  </div>
</div>
@endsection
