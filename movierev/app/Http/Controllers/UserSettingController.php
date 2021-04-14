<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserSettingController extends Controller
{
    public function updateUser(Request $request)
    {
        $user = User::find(Auth::id());

        $updates = [];
        if ($request->input('email') !== null) {
            $updates['email'] = $request->input('email');
        }

        if ($request->input('currentPassword') !== null) {
            if (Hash::check($request->input('currentPassword'), $user->password)) {
                $updates['password'] = Hash::make($request->input('newPassword'));
            }
        }
        $user->update($updates);
        $user->save();

        return redirect()->back()->with('success', 'updated '.join(', ', array_keys($updates)));
    }

    public function destroy(Request $request)
    {
        $user = User::find(Auth::id());
        $user->delete();

        return redirect('/');
    }
}
