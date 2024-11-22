<!DOCTYPE html>
<html lang="ja">
<div class="own_posts">
    <a href='/goals/create'>create</a>
    @foreach($own_posts as $post)
    <div>
        <h4><a href="/goals/{{ $post->id }}">{{ $post->goals_name }}</a></h4>
        <small>{{ $post->user->name }}</small>
        <p>{{ $post->goals_reward}}</p>
        <p class='title'>
            <a href="/goals/{{ $post->id }}">{{ $post->updated_at }}</a>
        <p>{{$post->goals_is_achieved}}</p>
        </p>
    </div>
    <button type="button" onclick="completeGoal({{$post->id}})">完了</button>

    <form action="/goals/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteGoal({{ $post->id }})">delete</button>
    </form>


    <h1 class="goals_name">編集画面</h1>
    <div class="content">
        <form action="/goals/done/{{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="submit" value="完了">

        </form>
    </div>
    @endforeach





</div>


<script>
    function deleteGoal(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>

</html>