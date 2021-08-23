<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifySuccess;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        $previous = session()->get('_previous.url');
        return view('frontend.login.login', compact('previous'));
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:32'
        ]);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->where('password', md5($password))->first();
        if($user){
            if($user->active == 0){
                return view('frontend.login.not-activated');
            }
            session()->put('user', $user);
            $previous = $request->previous;
            if($previous == route('logout')){
                $previous = route('frontend.home');
            }
            return redirect($previous);
        } else{
            session()->flash('LoginFail', true);
            return redirect()->route('login');
        }
    }
    public function logout(){
        session()->pull('user');
        return redirect()->route('login');
    }

    public function showForgotPass()
    {
        return view('frontend.login.forgot-pass');
    }

    public function resetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);
        $user = User::where('email', $request->email)->first();
        $newPassword = Str::random(8);
        $user->password = md5($newPassword);
        $user->save();
        Mail::to($user->email)->send(new NotifySuccess($user, $newPassword));
        session()->flash('resetSuccess', true);
        return redirect()->route('forgot-password');
    }
}
