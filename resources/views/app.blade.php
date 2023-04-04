<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/zephyr/bootstrap.min.css" />
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
</head>

<body class="text-green-200">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Sample Products Catalog</a>
      <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#searchModal">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </nav>

  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="searchModalLabel">Keyword Search</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="search-form" class="d-flex ms-auto" role="search" action="./">
            <input class="form-control me-2" type="search" name="q" placeholder="Enter Keywords..." aria-label="Search">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="search-form" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
  </div>


  @yield('content')

  <footer class="bg-dark text-center text-white p-3 mt-5">
    <small>Masapochi.me</small>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
