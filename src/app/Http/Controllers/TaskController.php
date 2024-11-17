<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Task $task)
    {
        return view('index')->with(['tasks' => $task->getPaginateByLimit()]);
    }     


    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Task $task)
    {
        return view('tasks.show')->with(['task' => $task]);
        //'task'はbladeファイルで使う変数。中身は$taskはid=1のtaskインスタンス。
    }
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $task->fill($input)->save();
        return redirect('/tasks/' . $task->id);
    }
}