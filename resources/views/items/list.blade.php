@extends('app')

@section('content')
{{ Breadcrumbs::render('list', $current) }}

@isset($current)
  <h1>{{ $current->name }}</h1>
@endisset
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
