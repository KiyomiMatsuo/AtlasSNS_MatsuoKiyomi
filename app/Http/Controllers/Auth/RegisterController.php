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
                'username' => ['required', 'string', 'between:2,12'],
                'mail' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'email', 'min:5' , 'max:40', 'unique:users'],
                'password' => ['required', 'string', 'alpha_num' , 'min:8', 'max:20' ,'confirmed'],
            ],[
                'username.required' => 'ユーザー名は必須です',
                'username.between' => 'ユーザー名は2文字以上,12文字以内で入力してください',
                'mail.required' => 'メールアドレスは必須です',
                'mail.between' => 'メールアドレスは5文字以上,40文字以内で入力してください',
                'mail.unique' => 'このメールアドレスは既に使用されています',
                'password.required' => 'パスワードは必須です',
                'password.alpha_num' => '英数字で入力してください',
                'password.between' => 'パスワードは8文字以上,20文字以内で入力してください',
                'password_confirmation.required' => 'パスワード確認は必須です',
                'password_confirmation.alpha_num' => '英数字で入力してください',
                'password_confirmation.between' => 'パスワード確認は8文字以上,20文字以内で入力してください',
                'password_confirmation.confirmed' => 'パスワードと一致していません',
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
