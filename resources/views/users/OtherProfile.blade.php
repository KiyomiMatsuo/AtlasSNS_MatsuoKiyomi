@extends('layouts.login')

@section('content')

<div class="other-profile">
  <figure><img class="icon" src="{{ asset('/storage/images/'.$users->images) }}" ></figure>
  <dl>
    <div class="other-name">
      <dt>ユーザー名</dt>
      <dd>{{ $users->username }}</dd>
    </div>
    <div class="other-bio">
      <dt>自己紹介</dt>
      <dd>{{ $users->bio }}</dd>
    </div>
  </dl>
  <div class="follow-btn other">
    @if (auth()->user()->isFollowing($users->id))
    <form action="{{ route('unfollow', ['user' => $users->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', ['user' => $users->id]) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif
  </div>
</div>

@if($posts->isEmpty())
<p class="no-post">投稿がありません</p>
@else
<div>
@foreach($posts as $post)
<ul>
  <div class="post-block">
    <li>
      <figure><img class="icon" src="{{ asset('/storage/images/'.$users->images) }}" ></figure>
      <div class="post-content">
        <div>
          <span class="post-name">{{ $post ->user ->username }}</span>
          <span>{{ substr( $post -> created_at, 0, 16) }}</span>
        </div>
        <div>{{ $post -> post }}</div>
      </div>
    </li>
  </ul>
  @endforeach
</div>
  @endif


@endsection
