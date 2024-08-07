@extends('layouts.login')

@section('content')

<div class="">
  <img class="icon" src="{{ asset('images/'.$users->images) }}" >
  <p>ユーザー名  {{ $users->username }}</p>
  <p>自己紹介  {{ $users->bio }}</p>
</div>

<div class="">
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

<div class="">
  @if($posts->isEmpty())
  <p>投稿がありません</p>
  @else
  @foreach($posts as $post)
  <ul>
    <li>
      <div>{{ $post -> post }}</div>
      <div>{{ $post -> created_at }}</div>
    </li>
  </ul>
  @endforeach
  @endif
</div>


@endsection
