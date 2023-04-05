<div class="hero-container position-relative">
  <img class="hero-image w-100 h-100 img-fluid" src="{{ $current->heroImage() }}" alt="">
  <div class="sub-hero-title-container hero-title-container shadow-lg">
    <h1 class="text-white">{{ $current->name }}</h1>
    <p class="text-white mb-0">{{ $current->description }}</p>
  </div>
</div>
