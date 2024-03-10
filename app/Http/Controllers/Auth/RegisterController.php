<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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

    public function register(Request $request){
        if($request->isMethod('post')){

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            //↓ユーザーの新規登録処理にバリデーション処理を実装
            $validated = $request->validate([
                'username' => ['required', 'string', 'min:2' , 'max:12'],
                'mail' => ['required', 'string', 'email', 'min:5' , 'max:40', 'unique:users'],
                'password' => ['required', 'string', 'alpha_num' , 'min:8', 'max:20' , 'confirmed'],
            ]);

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added')->with('username', $username);  //->with()を使うことでセッションが定義される
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
