@extends('app')

@section('content')
{{ Breadcrumbs::render('list', $current) }}

<h1>{{ $current->name }}</h1>

<ul>
  @foreach($current->features as $feature)
    <li>*{{ $feature->content }}</li>
  @endforeach
</ul>

<table>
  @foreach($current->specs as $spec)
    <tr>
      <th>{{ $spec->heading }}</th>
      <td>{{ $spec->content }}</td>
    </tr>
  @endforeach
</table>

<div>
  @foreach($current->icons as $icon)
    <img src="{{ $icon->slug }}" alt="{{ $icon->name }}">
  @endforeach
</div>
@endsection
