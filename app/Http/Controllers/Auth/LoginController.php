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
        // get login input
        $login = request()->input('login');

        // check if email or username is used
        $loginType = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        // merge to the request data
        request()->merge([$loginType => $login]);

        // return login type either email or username
        return $loginType;
    }

    public function username()
    {
        return $this->username;
    }
}
