<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!--Bootstrap（css）を反映させる記述-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

    <!--Bootstrap（js）を反映させる記述-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id = "head">
            <h1  class="atlas-logo"><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div class="profile">
                <span class="login-name">{{ Auth::user()->username }}さん</span>
                    <button type="button" class="menu-btn">
                        <span class="inn"></span>
                    </button>
                    <img class="icon home" src="{{ asset('/storage/images/'.Auth::user()->images) }}" >
                <nav class="menu">
                    <ul>
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <dl>
                    <div class="follow-count">
                        <dt>フォロー数</dt>
                        <dd>{{ Auth::user()->following()->count() }}名</dd>
                    </div>
                    <div class="follow-list-btn">
                        <p class="btn btn-primary"><a href="/follow-list">フォローリスト</a></p>
                    </div>
                </dl>

                <dl>
                    <div class="follower-count">
                        <dt>フォロワー数</dt>
                        <dd>{{ Auth::user()->followed()->count() }}名</dd>
                    </div>
                    <div class="follower-list-btn">
                        <p class="btn btn-primary "><a href="/follower-list">フォロワーリスト</a></p>
                    </div>
                </dl>
            </div>
            <div class="user-search-btn">
                <p class="btn btn-primary"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
