<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('Users.index')->with([
            'own_posts' => $user->getOwnPaginateByLimit(),
            'set_goal' => $user->getSetPaginateByLimit()
        ]);
    }
    public function admin(User $user)
    {
        return view('Users.admin')->with([
            'own_posts' => $user->getOwnPaginateByLimit(),
            'set_goal' => $user->getSetPaginateByLimit()
        ]);

        return Inertia::render('Admin', [
            'own_posts' => $user->getOwnPaginateByLimit(),
            'set_goal' => $user->getSetPaginateByLimit()
        ]);
    }
    public function reset(User $user)
    {
        $user->resetGoalsSet();

        return redirect('/dashboard');
    }
}
