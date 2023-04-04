@extends('app')

@section('content')
{{ Breadcrumbs::render('list', $current) }}

@include('partials.hero', ['current' => $current])

<div class="container">
  <ul>
    @foreach($list as $item)
      <li>
        <a href="{{ $item->path() }}">
          <p>{{ $item->path() }}</p>
          {{ $item->name }}
          {{ $item->model }}
        </a>
      </li>
    @endforeach
  </ul>
</div>

@endsection
