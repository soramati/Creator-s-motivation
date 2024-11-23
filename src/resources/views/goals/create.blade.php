<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Blog</title>
</head>

<body>

    <form action="/goals" method="POST">
        @csrf
        <div class="title">
            <h2>タイトル</h2>
            <input type="text" name="goal[goals_name]" placeholder="タイトル" value="{{ old('goal.goals_name') }}" />
            <p class="title__error" style="color:red">{{ $errors->first('goal.goals_name') }}</p>
        </div>
        <div class="title">
            <h2>期限</h2>
            <input type="datetime-local" name="goal[goals_deadline]" placeholder="タイトル" value="{{ old('goal.goals_deadline') }}" />
            <p class="title__error" style="color:red">{{ $errors->first('goal.goals_deadline') }}</p>
        </div>
        <div class="body">
            <h2>条件</h2>
            <textarea name="goal[goals_conditions]" placeholder="今日も1日お疲れさまでした。">{{ old('goal.goals_conditions') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('goal.goals_conditions') }}</p>
        </div>
        <div class="body">
            <h2>ごほうび</h2>
            <textarea name="goal[goals_reward]" placeholder="今日も1日お疲れさまでした。">{{ old('goal.goals_reward') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('goal.goals_reward') }}</p>
        </div>
        <input type="submit" value="保存" />
    </form>
    <div class="back">[<a href="/">back</a>]</div>
</body>

</html>