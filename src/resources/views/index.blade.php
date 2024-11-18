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
                <p class='title'>
                    <a href="/goals/{{ $goal->id }}">{{ $goal->updated_at }}</a>
                </p>
                <form action="/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteGoal({{ $goal->id }})">delete</button> 
                </form>
                @endforeach
                

        </div>

    </body>
    <script>
    function deleteGoal(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</html>