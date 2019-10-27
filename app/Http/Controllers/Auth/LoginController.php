<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $admin = [
          'username' => $request->username,
          'password' => $request->password,
          'role_id' => 1,
          'is_login' => '0',
          'status' => 'E',
        ];

        if (Auth::attempt($admin)){
            $acc = User::findOrFail(Auth::id());
            $acc->update([
               'is_login' => '1',
               'last_login' => Carbon::now(),
            ]);
            return redirect()->route('admin');
        }
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $acc = User::findOrFail(Auth::id());
        $acc->update([
            'is_login' => '0',
            'last_logout' => Carbon::now(),
        ]);

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('login');
    }
}
