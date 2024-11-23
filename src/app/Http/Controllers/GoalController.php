<?php

namespace App\Http\Controllers;


use App\Models\Goal;
use App\Http\Requests\GoalRequest;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index(Goal $goal)
    {
        return view('index')->with(
            ['goals' => $goal->getPaginateByLimit()]
        );
    }


    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$goalはid=1のPostインスタンス
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
        $input += ['user_id' => $request->user()->id];
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
        $input_goal += ['user_id' => $request->user()->id];
        $goal->fill($input_goal)->save();
        return redirect('/goals/' . $goal->id);
    }
    public function done(Goal $goal)
    {
        $goal->goals_is_achieved = 1 - $goal->goals_is_achieved;
        $goal->save();
        return redirect('/dashboard');
    }

    public function set(Goal $goal)
    {
        //既存のgoalのgoals_is_setを0にする
        Goal::where('user_id', Auth::id())->update(['goals_is_set' => 0]);
        //選択されたgoalのgoals_is_setを1にする
        $goal->goals_is_set = 1 - $goal->goals_is_set;
        $goal->save();
        return redirect('/dashboard');
    }

    public function delete(Goal $goal)
    {
        $goal->delete();
        return redirect('/dashboard');
    }
    public function resetGoalsSet(Goal $goal)
    {
        return redirect('/dashboard');
    }
}
