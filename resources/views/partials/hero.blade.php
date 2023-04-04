<div class="position-relative" style="height: calc(100vh - 122px)">
  <img class="w-100 h-100 img-fluid" style="object-fit: cover" src="{{ $current->heroImage() }}" alt="">
  <div class="position-absolute top-50 left-50 p-5 ms-5 w-50 shadow-lg" style="background-color: rgba(0,0,0,.5); transform: translateY(-50%)">
    <h1 class="text-white">{{ $current->name }}</h1>
    <p class="text-white mb-0">{{ $current->description }}</p>
  </div>
</div>
