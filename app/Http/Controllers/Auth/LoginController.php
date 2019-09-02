<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findLoginType();
    }

    public function findLoginType()
    {
        $login = request()->input('login');

        $loginType = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        request()->merge([$loginType => $login]);

        return $loginType;
    }

    public function username()
    {
        return $this->username;
    }
}
