@extends('app')

@section('content')
@if(request()->route()->getName() !== 'home')
  {{ Breadcrumbs::render('list', $current) }}
@endif

@isset($current)

  <h1>{{ $current->name }}</h1>
@endisset
<ul>
  @foreach($list as $item)
    <li>
      <a href="{{ $item->path() }}">
        {{ $item->name }}
      </a>
    </li>
  @endforeach
</ul>
@endsection
