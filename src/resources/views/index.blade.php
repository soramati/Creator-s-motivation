<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='task'>
                    <h2 class='title'>{{ $task->title }}</h2>
                    <p class='body'>{{ $task->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>