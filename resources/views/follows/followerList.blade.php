@extends('layouts.login')

@section('content')
<div class="follower-list">
  <p class="follower-name">フォロワーリスト</p>
  <div class="follower-list-icon">
    @foreach($followed as $followed)
    <a href="/users/{{ $followed -> id }}/profile">
      <img class="icon follower" src="{{ asset('/storage/images/'.$followed->images) }}" >
    </a>
    @endforeach
  </div>
</div>

<div>
  @foreach($posted as $posted)
  <ul>
    <div class="post-block">
      <li>
        <a href="/users/{{ $posted-> user-> id }}/profile">
          <img class="icon" src="{{ asset('/storage/images/'.$posted-> user-> images) }}" >
        </a>
        <div class="post-content">
          <span class="post-name">{{ $posted-> user-> username }}</span>
          <div>{{ $posted-> post }}</div>
        </div>
        <div class="post-date">{{ substr( $posted -> created_at, 0, 16) }}</div>
      </li>
    </div>
  </ul>
  @endforeach
</div>

@endsection
