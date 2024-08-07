@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/profile']) !!}

<div class="edit-profile">
  <img class="icon" src="{{ asset('images/'.Auth::user()->images) }}" >
  <div>
  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',Auth::user()->username,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード') }}
  {{ Form::password('password',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード確認') }}
  {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('自己紹介') }}
  {{ Form::text('self-introduction',Auth::user()->bio,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('アイコン画像') }}
  {{ Form::file('icon-image',null,['class' => 'input']) }}
  </div>
  {{ Form::submit('更新') }}

  {!! Form::close() !!}

</div>


@endsection
