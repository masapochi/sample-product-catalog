@extends('app')

@section('content')

{{ Breadcrumbs::render('search') }}

<div class="container">
  <h1 class="mt-5 mb-4">Search results for "{{ request()->q }}"</h1>

  {{ $items->onEachSide(1)->links() }}
  <div class="row">
    @forelse($items->items() as $item)
      @include('partials.card', ['item' => $item])
    @empty
      <p class="mt-3">No search results found.<br>Please try again with different keywords.</p>
    @endforelse
  </div>
  {{ $items->onEachSide(1)->links() }}
</div>

@endsection
