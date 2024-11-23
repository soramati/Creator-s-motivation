<!DOCTYPE html>
<html lang="ja">


<div class="top">
    @foreach($own_posts as $goal)
    @if($goal->goals_is_set == 1)

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
@endforeach
<a href='/goals/create'>create</a>

<div class="col">

    <div class="row">
        @foreach($own_posts as $goal)
        @if($goal->goals_is_achieved == 0)
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
        @endforeach
    </div>


    <div class="row">
        <div class="card">
            @foreach($own_posts as $goal)
            @if($goal->goals_is_achieved == 1)
            <div class="card">
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
        @endforeach
    </div>
</div>

<style>
    .top {
        display: flex;
        justify-content: space-around;
    }

    .col {
        display: flex;
        ;
    }

    .row {
        display: flex;
        justify-content: space-around;
        width: 100%;
    }

    .Basic {
        display: flex;
        justify-content: space-around;
    }

    .card {
        display: flex;
        justify-content: space-around;
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