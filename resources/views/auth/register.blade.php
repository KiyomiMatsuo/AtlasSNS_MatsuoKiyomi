@extends('layouts.logout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div class="login-block">
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'form-name']) }}
</div>

<div class="login-block">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'form-mail']) }}
</div>

<div class="login-block">
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'form-pass']) }}
</div>

<div class="login-block">
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'form-pass-con']) }}
</div>

<div class="text-right">
  {{ Form::submit('新規登録',['class'=>'btn btn-danger']) }}
</div>

<p class="log-b"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
