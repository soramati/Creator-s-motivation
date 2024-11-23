<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('goals')->find(Auth::id())->goals()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function getSetPaginateByLimit()
    {


        $set_goal = $this::with('goals')->find(Auth::id())->goals()->orderBy('updated_at', 'DESC')->where('goals_is_set', true)->first();

        return $set_goal;
    }
    public function resetGoalsSet()
    {
        $old_goal = $this::with('goals')->find(Auth::id())->goals()->orderBy('updated_at', 'DESC')->where('goals_is_set', true);
        foreach ($old_goal as $goal) {
            $goal->goals_is_set = false;
            $goal->save();
        }
    }
}
