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
    <ul>
        <li><img src="{{ asset('images/'.Auth::user()->images) }}" ></li>
        <li>{{ $user->username }}</li>
    </ul>
    @endforeach

</div>


@endsection
