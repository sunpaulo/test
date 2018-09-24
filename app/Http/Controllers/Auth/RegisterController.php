<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignUpRequest;
use App\Http\Controllers\Controller;
use App\Services\Logical\UserManagement;
use Illuminate\Auth\Events\Registered;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  SignUpRequest  $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function register(SignUpRequest $request)
    {
        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param SignUpRequest $request
     * @return \App\Models\User
     * @throws \Exception
     */
    protected function create(SignUpRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = UserManagement::createFromRequest($request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $user;
    }

    public function redirectTo()
    {
        return route(\Auth::user()->getRole() . '.index');
    }
}
