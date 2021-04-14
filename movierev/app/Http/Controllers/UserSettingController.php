<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
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
		if ($request->input('email') !== null)
		{
			$updates['email'] = $request->input('email');
		}
		
		if ($request->input('currentPassword') !== null)
		{
			if(Hash::check($request->input('currentPassword'), $user->password))
			{
				
				$updates['password'] = Hash::make($request->input('password'));		
			}
		}

		$user->update($updates);
		$user->save();
		return redirect()->back()->with('success', 'updated ' . join(', ', array_keys($updates)));		

	}
		public function destroy(Request $request)
		{
			$user = User::find(Auth::id());
			$user->delete();
			return redirect('/');
		}

		
		public function uploadAvatar(Request $request)
		{
			
			$request->validate([
				'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
			]);
	
			$user = User::findOrFail(auth()->user());
	
			if($request->has('avatar')) {
				$image = $request->file('avatar');
				$name = Str::slug($user->name . '_' . time());
				$folder = '/uploads/images/';
				$filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
				$this->uploadOne($image, $folder, 'public', $name);
				$user->avatar = $filePath;
			}
	
			$user->save();
			return back()->with(['status' => 'Image uploaded successfully']);

		}
}
