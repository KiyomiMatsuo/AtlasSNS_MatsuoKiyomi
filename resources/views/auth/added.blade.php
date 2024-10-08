@extends('layouts.logout')

@section('content')

<div id="clear">
  <h2 class="log-user">{{ session('username') }}さん</h2>  <!-- $username が session を使って表示されている-->
  <p class="log-text">ようこそ! AtlasSNSへ</p>
  <p class="log-comp">ユーザー登録が完了しました。<br>早速ログインをしてみましょう!</p>

  <div class="text-center">
    <p class="btn btn-danger"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection
