@extends('layouts.login')

@section('content')
<div>
  <ul>
    <li>
      <div class="my-post">
        <h2><img class="icon" src="{{ asset('/storage/images/'.$user->images) }}" ></h2>
        {!! Form::open(['url' => '/post/create']) !!}
        <div>
          {{ Form::textarea('post', null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。'])}}
        </div>
        <button type="submit"><img class="send-btn" src="images/post.png"></button>
        {!! Form::close() !!}
      </div>
    </li>
    <li>
      @foreach ($posts as $post)
      <ul>
        <div class="post-block">
          <li>
            <figure><img class="icon" src="{{ asset('/storage/images/'.$post->user->images) }}" ></figure>
            <div class="post-content">
              <div>
                <div class="post-name">{{ $post ->user ->username }}</div>
                <div>{{ $post -> created_at }}</div>
              </div>
            <div>
              {{ $post -> post }}
            </div>
            <div class="edit-modal">
              <!-- 投稿の編集ボタン -->
              <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <button type="submit"><img class="edit-btn" src="images/edit.png"></button>
              </a>
            </div>
              <!-- 削除ボタン -->
            <div class="box">
              <a href="/post/{{ $post->post }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                <button type="submit">
                  <img class="trash-btn" src="images/trash.png"alt=""/>
                  <img class="trash-btn" src="images/trash-h.png"alt=""/>
                </button>
              </a>
            </div>
          </li>
        </div>
      </ul>
      @endforeach
      <div class="modal js-modal">
          <div class="modal__bg js-modal-close"></div>
          <div class="modal__content">
             <form action="/top/edit" method="post">
                  <textarea name="upPost" class="modal_post"></textarea>
                  <input type="hidden" name="id" class="modal_id" value="">
                  <button type="submit" value=""><img class="edit-btn" src="images/edit.png"></button>
                  {{ csrf_field() }}
             </form>

          </div>
      </div>
    </li>
  </ul>
</div>

@endsection
