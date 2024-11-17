<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/goals" method="post">
            @csrf
            <div class="title">
                <h2>やりたいこと</h2>
                <input type="text" name="goal[goals_name]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>ごほうび</h2>
                <textarea name="goal[goals_reward]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>