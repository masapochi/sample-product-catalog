@extends('app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($items as $item)
      @include('partials.card', ['item' => $item])
    @endforeach
  </div>
</div>

@endsection
