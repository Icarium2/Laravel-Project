<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $user = User::find(Auth::id());

        $updates = [];
        if ($request->input('email') !== null) {
            $updates['email'] = $request->input('email');
        }

        if ($request->input('currentPassword') !== null) {
            if (Hash::check($request->input('currentPassword'), $user->password)) {

                $updates['password'] = Hash::make($request->input('password'));
            }
        }

        $user->update($updates);
        $user->save();
        return redirect()->back()->with('success', 'updated ' . join(', ', array_keys($updates)));
    }

    public function destroy()
    {
        $user = User::find(Auth::id());
        $user->forceDelete();
        return redirect('/');
    }


    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = User::find(Auth::id());

        $fileName = time() . '_' . $request->file('avatar')->getClientOriginalName();
        $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');

        $user->avatar = '/storage/' . $filePath;
        $user->save();

        return view('/settings')->with(['status' => 'Image uploaded successfully']);
    }
}
