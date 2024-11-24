<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>goals</title>
    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<div class="center">
    <a href='/goals/create'>create</a>

</div>

<div class="col center">
    <h1 class="title">goals</h1>
    <div class="grid grid-cols-4 gap-4">
        @foreach($own_posts as $goal)
        <div class="own_posts card">
            <div>
                <h4><a href="/goals/{{ $goal->id }}">{{ $goal->goals_name }}</a></h4>
                <p>id:{{ $goal->id}}</p>
                <p>goals_name:{{ $goal->goals_name}}</p>
                <p>goals_is_deadline:{{ $goal->goals_is_deadline}}</p>
                <p>goals_deadline:{{ $goal->goals_deadline}}</p>
                <p>goals_reward:{{ $goal->goals_reward}}</p>
                <p>goals_conditions:{{ $goal->goals_conditions}}</p>
                <p>goals_repeat:{{ $goal->goals_repeat}}</p>
                <p>goals_point:{{ $goal->goals_point}}</p>
                <p>goals_is_achieved:{{ $goal->goals_is_achieved}}</p>
                <p>goagoals_percentls_point:{{ $goal->goagoals_percentls_point}}</p>
                <p>wishlists_id:{{ $goal->wishlists_id}}</p>
                <p>goals_is_set:{{ $goal->goals_reward}}</p>
                <p>created_at:{{ $goal->created_at}}</p>
                <p>updated_at:{{ $goal->updated_at}}</p>
                <p>deleted_at:{{ $goal->deleted_at}}</p>
                <p>user_id:{{ $goal->user_id}}</p>
                <p>user_name{{ $goal->user->name }}</p>
            </div>
            <div class="content">
                <form action="/goals/set/{{ $goal->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="リセット">
                </form>
            </div>
            <form action="/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteGoal({{ $goal->id }})">delete</button>
            </form>

        </div>
        @endforeach
    </div>
    <Admin />




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