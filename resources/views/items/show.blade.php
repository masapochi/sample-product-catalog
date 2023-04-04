@extends('app')

@section('content')
{{ Breadcrumbs::render('list', $current) }}

<div class="position-relative vh-100">
  <img class="w-100 h-100 img-fluid" style="object-fit: cover" src="{{ asset("images/items/{$current->slug}/hero.jpg") }}" alt="">
</div>

<div class="container mt-5">
  <h1 class="">{{ $current->name }}</h1>
  <p class="mt-4">{{ $current->description }}</p>
  <div class="mt-4">
    @foreach($current->icons as $icon)
      <img src="{{ asset("images/icons/{$icon->slug}.jpg") }}" alt="{{ $icon->name }}" loading="lazy" decodinc="async">
    @endforeach
  </div>

  <section class=" mt-5">
    <h2 class="text-center">Features</h2>
    <div class="d-flex flex-column gap-5 mt-5">
      @foreach($current->features as $i=> $feature)
        <div class="row g-3 g-md-5 align-items-center">
          <div class="col-12 col-md-6">
            <img class="img-fluid shadow-lg" src="{{ asset("images/items/{$current->slug}/feature_" .$i+1 . ".jpg") }}" alt="" loading="lazy" decodinc="async">
          </div>
          <div class="col-12 col-md-6">
            <p>{{ $feature->content }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <section class="mt-5">
    <h2 class="text-center">Specs</h2>
    <div class="mt-5">
      <table class="table table-sm">
        @foreach($current->specs as $spec)
          <tr>
            <th>{{ $spec->heading }}</th>
            <td>{{ $spec->content }}</td>
          </tr>
        @endforeach
      </table>
    </div>

  </section>
</div>
@endsection
