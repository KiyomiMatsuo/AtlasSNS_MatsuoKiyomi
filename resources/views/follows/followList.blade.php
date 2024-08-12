@extends('layouts.login')

@section('content')
<div>
  <p>フォローリスト</p>
  @foreach($follows as $follow)
  <img class="icon" src="{{ asset('/storage/images/'.$follow->images) }}" alt="">
  @endforeach
</div>
<div>
  @foreach($posts as $post)
  <a href="/users/{{ $post-> user-> id }}/profile">
    <img class="icon" src="{{ asset('/storage/images/'.$post-> user-> images) }}" >
  </a>
  <p>{{ $post-> user-> username }}</p>
  <p>{{ $post->post }}</p>
  @endforeach
</div>

@endsection
