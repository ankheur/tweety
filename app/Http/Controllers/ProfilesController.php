<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user) 
    {
        return view('profiles.show-profile', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->latest()->paginate(5)
        ]);
    }


    public function edit() 
    {
        // abort_if($user->isNot(current_user()), 403);

        return view('profiles.edit-profile', [
            'user' => current_user()
        ]);
    }


    public function update()
    {
        $user = current_user();

        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:25', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'biography' => ['string', 'max:500'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)]            
        ]);

        if ( !empty(request('password')) ){
            $attributes['password'] = request()->validate([
                'password' => ['string', 'min:8', 'max:255', 'confirmed']
            ])['password'];
        }

        if ( request('avatar') ) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
