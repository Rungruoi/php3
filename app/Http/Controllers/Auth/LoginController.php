<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;

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
    
    public function loginForm(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect()->route('homepage');
    }
    return  view('auth.login');

    }

public function redirectToProvider()
{
    return Socialite::driver('facebook')->redirect();
}
public function handleProviderCallback()
{
    $userSocial = Socialite::driver('facebook')->user();
    $findUser=User::where('email',$userSocial->email)->first();
    if($findUser){
        Auth::login($findUser);
        return redirect()->route('homepage'); 
    }
    else{
        $user = new User;
        
        $user->name=$userSocial->getName();
        $user->email=$userSocial->getEmail();
        $user->password=bcrypt(123456);
        $user->address="Việt Nam";
        $user->numberphone="0393079176";
        $user->role="1";
        $user->provider_id=$userSocial->getId();
        $user->provider='facebook';
        $user->save();
        Auth::login($user);
        return redirect()->route('homepage');
    }    
}


public function ToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
public function Callback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('provider_id', $user->id)->first();

            if($finduser){
   
                Auth::login($finduser);
  
                 return redirect()->route('homepage');
   
            }else{
                $newUser= new User;
                    $newUser->name=$user->getName();
                    $newUser->email=$user->getEmail();
                    $newUser->password=bcrypt(123456);
                    $newUser->address="Việt Nam";
                    $newUser->numberphone="0393079176";
                    $newUser->role="1";
                    $newUser->provider_id=$user->getId();
                    $newUser->provider='google';
                    $newUser->save();

                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'password'=>bcrypt(123456),
                //     'provider_id'=> $user->id
                // ]);
  
                Auth::login($newUser);
   
                return redirect()->route('homepage');
            }
  
        } catch (Exception $ex) {
            return redirect('login/google');
        }
    
    }



}


