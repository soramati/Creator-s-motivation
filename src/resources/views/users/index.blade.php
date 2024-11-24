<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>goals</title>
    <!-- Fonts -->
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<div class="top center">
    @if($set_goal ==! null)


    <div class="card">
        <div>
            <h4><a href="/goals/{{ $set_goal->id }}">{{ $set_goal->goals_name }}</a></h4>
            <p>{{ $set_goal->goals_deadline}}</p>
            <p>{{ $set_goal->goals_conditions}}</p>
            <p>{{ $set_goal->goals_reward}}</p>
            <small>{{ $set_goal->user->name }}</small>
            <p class='title'>
                <a href="/goals/{{ $set_goal->id }}">{{ $set_goal->updated_at }}</a>
            <p>{{$set_goal->goals_is_achieved}}</p>
            <small>SET:{{ $set_goal->goals_is_set }}</small>
            </p>
        </div>
        <div class="content">
            <form action="/goals/set/{{ $set_goal->id }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="submit" value="リセット">
            </form>
        </div>
        <form action="/goals/{{ $set_goal->id }}" id="form_{{ $set_goal->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteGoal({{ $set_goal->id }})">delete</button>
        </form>
        <div class="content">
            <form action="/goals/done/{{ $set_goal->id }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="submit" value="完了">
            </form>
        </div>
    </div>


    @endif
</div>
<div class="center">
    <a href='/goals/create'>create</a>

</div>

<div class="col center">

    <div class="grid grid-cols-4 gap-4">
        @foreach($own_posts as $goal)
        @if($goal->goals_is_achieved == 0)
        @if($goal->goals_is_set == 0)
        <div class="own_posts card">
            <div>
                <h4><a href="/goals/{{ $goal->id }}">{{ $goal->goals_name }}</a></h4>
                <p>{{ $goal->goals_deadline}}</p>
                <p>{{ $goal->goals_conditions}}</p>
                <p>{{ $goal->goals_reward}}</p>
                <small>{{ $goal->user->name }}</small>
                <p class='title'>
                    <a href="/goals/{{ $goal->id }}">{{ $goal->updated_at }}</a>
                <p>{{$goal->goals_is_achieved}}</p>
                </p>
            </div>
            <div class="content">
                <form action="/goals/set/{{ $goal->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="SET">
                </form>
            </div>
            <form action="/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteGoal({{ $goal->id }})">delete</button>
            </form>
            <div class="content">
                <form action="/goals/done/{{ $goal->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="完了">
                </form>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>


    <div class="row">
        <div class="card">
            @foreach($own_posts as $goal)
            @if($goal->goals_is_achieved == 1)
            <div class="card col">
                <h4><a href="/goals/{{ $goal->id }}">{{ $goal->goals_name }}</a></h4>
                <p>{{ $goal->goals_deadline}}</p>
                <p>{{ $goal->goals_conditions}}</p>
                <p>{{ $goal->goals_reward}}</p>
                <small>{{ $goal->user->name }}</small>
                <p class='title'>
                    <a href="/goals/{{ $goal->id }}">{{ $goal->updated_at }}</a>
                <p>{{$goal->goals_is_achieved}}</p>
                </p>
                <div class="content">
                    <form action="/goals/set/{{ $goal->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" value="SET">
                    </form>
                </div>
                <form action="/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteGoal({{ $goal->id }})">delete</button>
                </form>
                <div class="content">
                    <form action="/goals/done/{{ $goal->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" value="完了">
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<style>
    .center {
        display: flex;
        justify-content: center;
    }

    .top {
        display: flex;
        justify-content: center;
    }

    .col {
        display: flex;
        flex-direction: column;
    }

    .row {
        display: flex;
        align-content: space-around;
        width: 100%;
    }



    .card {
        display: flex;

        flex-direction: column;

        align-items: flex-start;
        border: 1px solid #333;
        width: 300px;
    }

    .content {
        display: flex;
        justify-content: space-around;
    }

    .content_goal {
        display: flex;
        justify-content: space-around;
    }

    .footer {
        display: flex;
        justify-content: space-around;
    }

    .edit {
        display: flex;
        justify-content: space-around;
    }

    .back {
        display: flex;
        justify-content: space-around;
    }

    .goal {
        display: flex;
        justify-content: space-around;
    }

    .title {
        display: flex;
        justify-content: space-around;
    }

    .body {
        display: flex;
        justify-content: space-around;
    }

    .title__error {
        display: flex;
        justify-content: space-around;
    }

    .body__error {
        display: flex;
        justify-content: space-around;
    }
</style>
<script>
    function deleteGoal(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>

</html>