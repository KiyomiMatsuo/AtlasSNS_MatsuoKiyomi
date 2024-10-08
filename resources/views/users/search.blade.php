@extends('layouts.login')

@section('content')
<div>
  <form action="#" class="search">
      @csrf
      <input class="search-form" type="text" name="keyword" placeholder="ユーザー名">
      <button type="submit"><img class="search-btn" src="images/search.png"></button>

      @if($keyword)
      <p class="search-key">{{ "検索ワード：" .$keyword }}</p>
      @endif
  </form>

    @foreach ($users as $user)
    <div>
      <div class="search-list">
        <img class="icon profile-icon" src="{{ asset('/storage/images/'.$user->images) }}" >
        <div class="search-name">
          <p>{{ $user->username }}</p>
        </div>
        <div class="follow-btn">
          @if (auth()->user()->isFollowing($user->id))
          <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
          @else
          <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
          @endif
        </div>
      </div>
    </div>
    @endforeach

</div>


@endsection
