<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::orderBy('name')->paginate(10);
    //     return view('admin.users', compact('users'))->with('i', (request()->input('page', 1) -1) * 10);
    // }

    public function useredit()
    {
        $user = Auth::user();
        return view('usersettings', compact('user'));
    }

    // User update
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'email' => ['sometimes', Rule::unique('users')->ignore($user->id),],
            //'password' => 'sometimes|min:6|same:confirm password',            
        ]);
        
        $user->name = request('name');
        $user->email = request('email');

        $user->save();
        return redirect()->back()->withMessage('Your personal data has successfully updated!');
    }

    /**
     * Password update and matching logic.
     */
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->back()->withMessage('Password has changed successfully!');
    }
}
