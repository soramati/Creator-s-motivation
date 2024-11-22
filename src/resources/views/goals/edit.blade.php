<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <goals_name>Blog</goals_name>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>


<body>
    <h1 class="goals_name">編集画面</h1>
    <div class="content">
        <form action="/goals/{{ $goal->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__goals_name'>
                <h2>タイトル</h2>
                <input type='text' name='goal[goals_name]' value="{{ $goal->goals_name }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='goal[goals_reward]' value="{{ $goal->goals_reward }}">
            </div>
            <input type="submit" value="保存">
            <a href="/dashboard">戻る</a>
        </form>
    </div>



    </body>
</html>