@if(request()->route()->getName() !== 'home')
  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    @isset($parents)
      @foreach($parents as $parent)
        <li>
          <a href="{{ $parent->path() }}">{{ $parent->name }}</a>
        </li>
      @endforeach
    @endisset
    <li>{{ $current->name }}</li>
  </ul>
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
