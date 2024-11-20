<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Goal extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'goals_name',
        'goals_is_deadline',
        'goals_deadline',
        'goals_reward',
        'goals_conditions',
        'goals_repeat',
        'goals_point',
        'goals_is_achieved',
        'goals_percent',
        'goals_is_set',
        'user_id',
        'goals_user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
           // updated_atで降順に並べたあと、limitで件数制限をかける
    // return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);

    }

}
