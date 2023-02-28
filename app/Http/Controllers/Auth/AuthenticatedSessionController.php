<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthenticatedSessionController extends Controller
{




  public function customLogin(Request $request)
  {
      $request->validate([
          'email' => 'required|string',
          'password' => 'required',
      ]);

       $email = $request->email;
       $password = $request->password;

       $validateEmail = Validator::make($request->all(), [
           'email' => 'email',
       ]);
       if($validateEmail->fails()){
         $user = User::where('stu_id', $email)->first();
       }else{
          $user = User::where('email', $email)->first();
       }
       if(!$user){
           return redirect()->back()->with('error', 'Email or Password is incorrect');
       }
          if(Hash::check($password, $user->password)){
              Auth::login($user);
              return redirect()->route('home');
          }else{
              return redirect()->back()->with('error', 'Email or Password is incorrect');
          }


  }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
      $request->authenticate();

      $request->session()->regenerate();

      return redirect()->intended(RouteServiceProvider::HOME);

        // $request->authenticate();
        //
        // $request->session()->regenerate();
        //
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
