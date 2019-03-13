<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'admin/home';

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
//
    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        return view('admin.login');
//        , ['url' => 'admin']
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

//    protected function sendLoginResponse(Request $request)
//    {
//        $request->session()->regenerate();
//
//        $this->clearLoginAttempts($request);
//
//        foreach ($this->guard()->user()->role as $role)
//        {
//            if($role->name == 'admin')
//            {
//                return redirect('admin/home');
//            }
//            elseif ($role->name == 'editor')
//            {
//                return redirect('admin/editor');
//            }
//        }
//    }

}
