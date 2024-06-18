@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/profile']) !!}

<div class="edit-profile">
  <img src="{{ asset('images/'.Auth::user()->images) }}" >

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('自己紹介') }}
{{ Form::text('self-introduction',null,['class' => 'input']) }}

{{ Form::label('アイコン画像') }}
{{ Form::text('icon-image',null,['class' => 'input']) }}

{{ Form::submit('更新') }}

{!! Form::close() !!}

</div>


@endsection
