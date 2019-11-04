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

        $liaison = [
            'username' => $request->username,
            'password' => $request->password,
            'role_id' => 2,
            'is_login' => '0',
            'status' => 'E',
        ];

        $participant = [
            'username' => $request->username,
            'password' => $request->password,
            'role_id' => 3,
            'is_login' => '0',
            'status' => 'E',
        ];

        if (Auth::attempt($admin)){
            $this->isLogin(Auth::id());
            return redirect()->route('admin');
        } elseif (Auth::attempt($liaison)){
            $this->isLogin(Auth::id());
            return Auth::user();
        } else if (Auth::attempt($participant)) {
            $this->isLogin(Auth::id());
            return Auth::user();
        }
        return redirect()->route('login');
    }

    private function isLogin(int $id){
        $acc = User::findOrFail($id);
        return $acc->update([
            'is_login' => '1',
            'last_login' => Carbon::now(),
        ]);
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
