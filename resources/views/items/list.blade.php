@extends('app')

@section('content')
{{ Breadcrumbs::render('list', $current) }}

@include('partials.hero', ['current' => $current])

<div class="container">
  <div class="row">
    @foreach($list as $item)
      @include('partials.card', ['item' => $item])
    @endforeach
  </div>
</div>

@endsection
