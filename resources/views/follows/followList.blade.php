@extends('layouts.login')

@section('content')
<div class="follow-list">
  <p class="follow-name">フォローリスト</p>
  <div class="follow-list-icon">
    @foreach($follows as $follow)
    <a href="/users/{{ $follow -> id }}/profile">
      <img class="icon follow" src="{{ asset('/storage/images/'.$follow->images) }}" alt="">
    </a>
    @endforeach
  </div>
</div>
<div>
  @foreach($posts as $post)
  <ul>
    <div class="post-block">
      <li>
        <a href="/users/{{ $post-> user-> id }}/profile">
          <img class="icon" src="{{ asset('/storage/images/'.$post-> user-> images) }}" >
        </a>
        <div class="post-content">
          <span class="post-name">{{ $post-> user-> username }}</span>
          <div>{{ $post->post }}</div>
        </div>
        <div  class="post-date">{{ substr( $post -> created_at, 0, 16) }}</div>
      </li>
    </div>
  </ul>
  @endforeach
</div>

@endsection
