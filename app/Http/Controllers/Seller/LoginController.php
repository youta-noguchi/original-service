<?php

namespace App\Http\Controllers\Seller;//変更

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Providers\RouteServiceProvider;

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
   protected $redirectTo = RouteServiceProvider::SELLER_HOME;

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('guest:seller')->except('logout');
   }

   public function showLoginForm()
   {
       return view('seller.login');
   }

   /**
    *
    * @param  \Illuminate\Http\Request $request
    *
    * @return Response
    */
   public function authenticate(Request $request)
   {
       $request->validate([
           'email' => 'email|required',
           'password' => 'required|min:4',
       ]);
       if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
           return redirect()->route('items.index');//リダイレクト先は好きなところへ
       }else{
           return redirect()->back()->with('ログインに失敗しました');
       }
   }

   protected function guard()
   {
       return Auth::guard('seller');
   }
   
   public function logout(Request $request)
   {
       Auth::guard('seller')->logout();
       
       $request->session()->flush();
       $request->session()->regenerate();
       
       
       return redirect('/');
   }
    
}
