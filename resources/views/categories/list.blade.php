@isset($parents)
  <ul>
    @foreach($parents as $parent)
      <li>
        <a href="">{{ $parent->name }}</a>
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
        {{ $item->name }}
      </a>
    </li>
  @endforeach
</ul>
