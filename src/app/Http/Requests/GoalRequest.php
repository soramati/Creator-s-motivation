<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            // 'goals_name' => 'required|string|max:20',
            // 'goals_is_deadline'=>  'boolean',
            // 'goals_deadline' => 'date',
            // 'goals_reward', 'string|max:200',
            // 'goals_conditions' => 'string|max:200',
            // 'goals_repeat' => 'boolean',
            // 'goals_point' => 'integer|between:0,100',
            // 'goals_is_achieved' => 'boolean',
            // 'goals_percent' => 'integer|between:0,100',
            // 'goals_is_set'  => 'boolean',
            // 'users_id' => 'integer|min:1',
            // 'goals_user_id' => 'integer|min:1',
            
            //
        ];
    }
}
