

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
                </p>
            </div>

            <form action="/goals/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteGoal({{ $post->id }})">delete</button> 
                </form>
        @endforeach
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
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
