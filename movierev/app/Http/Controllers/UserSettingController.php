<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    public function index(User $user)
    {
        return view('user.settings', [
            'user' => $user,
        ]);
    }

    public function update(UserSettingController $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->name;
    }
}
