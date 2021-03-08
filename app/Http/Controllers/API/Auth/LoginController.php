<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;


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
    protected $redirectTo = '';

    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        if($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return response()->json([
                'success' => false,
                'errors' => [
                    "You've been locked out"
                ]
            ]);
        }

        $this->incrementLoginAttempts($request);

        try {
            if(!$token = JWTAuth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'email' => [
                            "Invalid email address or passowrd"
                        ]
                    ]
                ], 422);
            }
        } catch (JWTException $e) {
            //throw $th;
            return response()->json([
                'success' => false,
                'errors' => [
                    'email' => [
                        "Invalid email address or passowrd"
                    ]
                ]
            ], 422);
        }

        

        return response()->json([
            'success' => true,
            'data' => $request->user(),
            'token' => $token
        ], 200);
    }
}
