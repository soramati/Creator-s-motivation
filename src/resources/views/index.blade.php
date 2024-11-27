<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    @vite('resources/js/app.js')
</head>

</head>


<div id="custom-app">
    <admin-page> </admin-page>
</div>
<h1 class="title">goals</h1>
<a href="/admin">admin</a>
<a href="/login">Login</a>

<script>
    function deleteGoal(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>

</html>