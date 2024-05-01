@extends('layouts.login')

@section('content')
<div>
  <ul>
    <li>
      <div class="my-post">
        <h2><img src="images/icon1.png"></h2>
        {!! Form::open(['url' => '/post/create']) !!}
        <div>
          {{ Form::textarea('post', null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。'])}}
        </div>
        <button type="submit"><img class="post-send" src="images/post.png"></button>
        {!! Form::close() !!}
      </div>
    </li>
    <li>
      @foreach ($posts as $post)
      <ul>
        <div class="post-block">
         <li>
            <figure><img src="https://placehold.jp/50x50.png" alt="Aさん"></figure>
            <div class="post-content">
              <div>
                <div class="post-name">{{ $post ->user ->username }}さん</div>
                <div>{{ $post -> created_at }}</div>
              </div>
            <div>{{ $post -> post }}</div>
          </li>
        </div>
      </ul>
      @endforeach
    </li>
  </ul>
</div>

@endsection
