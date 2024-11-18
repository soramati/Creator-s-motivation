<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use App\Http\Requests\GoalRequest;

class GoalController extends Controller
{
    public function index(Goal $goal)
    {
        return view('index')->with(['goals' => $goal->getPaginateByLimit()]);
    }     


    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Goal $goal)
    {
        return view('goals.show')->with(['goal' => $goal]);
        //'goal'はbladeファイルで使う変数。中身は$goalはid=1のgoalインスタンス。
    }
    public function create()
    {
        return view('goals.create');
    }

    public function store(GoalRequest $request, Goal $goal)
    {
        $input = $request['goal'];
        $goal->fill($input)->save();
        return redirect('/goals/' . $goal->id);
    }

    public function edit(Goal $goal)
{
    return view('goals.edit')->with(['goal' => $goal]);
}
public function update(GoalRequest $request, Goal $goal)
{
    $input_goal = $request['goal'];
    $goal->fill($input_goal)->save();

    return redirect('/goals/' . $goal->id);
}

public function delete(Goal $goal)
{
    $goal->delete();
    return redirect('/');
}

}