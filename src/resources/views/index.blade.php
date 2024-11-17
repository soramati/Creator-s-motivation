<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/goals/create'>create</a>
        <div class='goals'>
            @foreach ($goals as $goal)
                <div class='goal'>
                    <h2 class='title'>{{ $goal->goals_name }}</h2>
                    <p class='body'>{{ $goal->goals_reward }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>