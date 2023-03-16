<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * User Controller
 */
class UserController extends Controller
{
    /**
     * regist a user
     */
    public function register() {
        return view('/users/register');
    }

    /**
     * insert a user to the database
     */
    public function insert(Request $request) {

        $formFields = $request->validate([
            'name'=>'required',
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            // check if it's same as password_confirmation's value.
            'password'=>['required', 'confirmed', 'min:6']
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user in the database
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('success', 'Registerd successfully and logged in.');
    }

    /**
     * show a user info
     */
    public function get() {
        $userInfo = User::find(auth()->id());
        $posts = Job::where('user_id', auth()->id())->get();

        return view('users/user', [
            "userInfo" => $userInfo,
            "posts" => $posts
        ]);
    }

    /**
     * update user info in the database
     */
    public function update(Request $request) {
        // Confirm identity of login user
        if ($request->id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users,email,' .$request->id
        ]);

        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Updated successfully.');
    }

    /**
     * delete the user from database
     */
    public function delete(Request $request) {
        // Confirm identity of login user
        if ($request->id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $user = User::find(auth()->id());
        $user->delete();

        // Logout
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Account deleted successfully');
    }

    /**
     * show login form
     */
    public function login() {
        return view('users/login');
    }

    /**
     * Authenticate user
     */
    public function authenticate(Request $request) {
        $formFields = request()->validate([
            'email'=>['required', 'email'],
            'password'=> 'required'
        ]);

        if (auth()->attempt($formFields)) {
            // when login is success
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Logged in successfully.');
        } else {
            // when login is failed
            return back()->with('fail', 'Email or Password is invalid');
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request) {

        // Logout
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out.');
    }
}
