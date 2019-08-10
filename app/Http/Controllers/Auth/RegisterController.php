<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterRequest $request)
    {   
        if($request->checkbox==""){ 
            $agree="Vui lòng chấp nhận điều khoản của chúng tôi!";
            return view('auth.register',compact('agree'));

        }
        // $model=new User();
        // $model->fill($request->all());
        // dd($model);
        if(
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address'=>$request->name,
            'numberphone'=>"0123456789",
            'provider'=>"Register",
            'provider_id'=>"4012",
        ])
        ){
        $mess="Bạn đã đăng ký tài khoản thành công";

        return view('auth.login',['mess'=>$mess]);   
        }
       
    }
}

    // protected function create(Request $request)

    // {

    //     // if($request->checkbox==""){
    //     //     $agree="Vui lòng chấp nhận điều khoản của chúng tôi!";
    //     //     return view('auth.register',compact('agree'));
    //     // }
        
    //     // if($request->password!=$request->repass){
    //     //     $mgspass="Mật khẩu không trùng nhau";
    //     //     return view('auth.register',compact('mgspass'));
    //     // }
    //     // $model=new User;
    //     // $model->fill($request->all());
    //     // dd($model);
    //     return User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    // }
 

   
