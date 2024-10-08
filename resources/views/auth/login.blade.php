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
{!! Form::open(['url' => '/login']) !!}

<h2>AtlasSNSへようこそ</h2>
<div class="login-block">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'form-mail']) }}
</div>

<div class="login-block">
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'form-pass']) }}
</div>

<div class="text-right">
  {{ Form::submit('ログイン',['class'=>'btn btn-danger' ]) }}
</div>

<p class="log-b"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
