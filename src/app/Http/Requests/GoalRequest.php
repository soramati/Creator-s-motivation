<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            // 下記のバリデーションにひっかかると、エラーメッセージが返るはずなのに、何も返ってこない
            'goal.goals_name' => 'required|string|max:20',
            'goal.goals_is_deadline'=>  'boolean',
            'goal.goals_deadline' => 'date',
            'goal.goals_reward', 'string|max:200',
            'goal.goals_conditions' => 'string|max:200',
            'goal.goals_repeat' => 'boolean',
            'goal.goals_point' => 'integer|between:0,100',
            'goal.goals_is_achieved' => 'boolean',
            'goal.goals_percent' => 'integer|between:0,100',
            'goal.goals_is_set'  => 'boolean',
            'goal.users_id' => 'integer|min:1',
            'goal.goals_user_id' => 'integer|min:1',
                       
        ];
    }
}
