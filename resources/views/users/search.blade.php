@extends('layouts.login')

@section('content')
<div class="search">
  <form action="#" id="form">
      @csrf
      <input type="text" name="keyword" placeholder="ユーザー名">
      <button type="submit"><img class="search-btn" src="images/search.png"></button>
    </form>
    @if($keyword)
      {{ "検索ワード：" .$keyword }}
    @endif
    @foreach ($users as $user)
    <div class="card">
      <div class="card-header">
        <img class="icon" src="{{ asset('/storage/images/'.$user->images) }}" >
        <div>
          <p>{{ $user->username }}</p>
        </div>
        <div>
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
