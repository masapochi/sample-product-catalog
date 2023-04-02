@isset($parents)
  <ul>
    <li>
      <a href="{{ route('home') }}">Home</a>
    </li>
    @foreach($parents as $parent)
      <li>
        <a href="{{ $parent->path() }}">{{ $parent->name }}</a>
      </li>
    @endforeach
  </ul>
@endisset

@isset($current)

  <h1>{{ $current->name }}</h1>
@endisset
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
