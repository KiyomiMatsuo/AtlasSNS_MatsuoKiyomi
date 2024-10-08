@extends('layouts.login')


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

@section('content')
<div class="profile-form">
  <img class="icon profile-icon" src="{{ asset('/storage/images/'.Auth::user()->images) }}" >
  <div class="edit-profile">
    <div class="update-block">
    {{ Form::label('username','ユーザー名',['class' => 'form-text']) }}
    {{ Form::text('username',Auth::user()->username,['class' => 'form-name']) }}
    </div>

    <div class="update-block">
    {{ Form::label('mail','メールアドレス',['class' => 'form-text']) }}
    {{ Form::text('mail',Auth::user()->mail,['class' => 'form-mail']) }}
    </div>

    <div class="update-block">
    {{ Form::label('password','パスワード',['class' => 'form-text']) }}
    {{ Form::password('password',['class' => 'form-pass']) }}
    </div>

    <div class="update-block">
    {{ Form::label('password_confirmation','パスワード確認',['class' => 'form-text']) }}
    {{ Form::password('password_confirmation',['class' => 'form-pass-con']) }}
    </div>

    <div class="update-block">
    {{ Form::label('bio','自己紹介',['class' =>'form-text']) }}
    {{ Form::text('bio',Auth::user()->bio,['class' => 'form-bio']) }}
    </div>

    <div class="update-block file">
    {{ Form::label('icon_image','アイコン画像',['class' =>'form-text']) }}
    {{ Form::file('icon_image',null,['class' => 'form-icon']) }}
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger">更新</button>
    </div>

    {!! Form::close() !!}

  </div>
</div>
@endsection
