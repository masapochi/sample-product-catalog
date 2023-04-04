<div class="col-12 col-md-6 col-lg-4 g-3">
  <div class="card">
    <img src="{{ $item->heroImage() }}" class="card-img-top" style="max-height: 236px;" alt="{{ $item->name }}" loading="lazy" decodinc="async">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->description }}</p>
      <a href="{{ $item->path() }}" class="btn btn-primary">More...</a>
    </div>
  </div>
</div>
