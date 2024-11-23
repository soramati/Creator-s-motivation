<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('Users.index')->with([
            'own_posts' => $user->getOwnPaginateByLimit()
        ]);
    }
}
