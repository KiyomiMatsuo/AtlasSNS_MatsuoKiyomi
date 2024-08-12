@extends('layouts.login')

@section('content')
<div>
  <p>フォロワーリスト</p>
  @foreach($followed as $followed)
  <img class="icon" src="{{ asset('/storage/images/'.$followed->images) }}" >
  @endforeach
</div>
<div>
  @foreach($posted as $posted)
  <a href="/users/{{ $posted-> user-> id }}/profile">
    <img class="icon" src="{{ asset('/storage/images/'.$posted-> user-> images) }}" >
  </a>
  <p>{{ $posted-> user-> username }}</p>
  <p>{{ $posted-> post }}</p>
  @endforeach
</div>
@endsection
