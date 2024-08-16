@extends('layouts.login')

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

{!! Form::open(['url' => '/profile/update','enctype' => 'multipart/form-data']) !!}
{{ Form::hidden('id',Auth::id()) }}


<div class="edit-profile">
  <img class="icon" src="{{ asset('/storage/images/'.Auth::user()->images) }}" >
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
  {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード確認') }}
  {{ Form::password('password_confirmation',['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('自己紹介') }}
  {{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('アイコン画像') }}
  {{ Form::file('icon_image',null,['class' => 'input']) }}
  </div>

  <button type="submit" class="btn btn-danger">更新</button>
  </a>

  {!! Form::close() !!}

</div>


@endsection
