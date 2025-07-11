<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

use Illuminate\Support\Facades\Log;



class ProfileController extends Controller
{
    public function update(Request $req)
    {



        /** @var User $user */
        $user = User::findorFail(Auth::id());
        $data = $req->validate([
            'name' => ['required', 'regex:/^[A-Za-z ]+(?:\s[A-Za-z ]+)?$/'], //2 or 1 dono words lega
            'email' => 'required|email',
            'contact' => [
                'required',
                'regex:/^[6-9][0-9]{9}$/',
                'unique:users,contact,' . $req->user()->id
            ],
            'education' => 'required|string|min:3|max:100',

            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Image logic
        if ($req->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Store new image
            $storedPath = $req->file('image')->store('images', 'public');

            if (!$storedPath) {
                return back()->with('toast_error', 'Image upload failed!');
            }

            $data['image'] = $storedPath;
        }

        $user->update($data);




        return redirect()->back()->with('toast_success', 'Profile updated successfully!');
    }
}
