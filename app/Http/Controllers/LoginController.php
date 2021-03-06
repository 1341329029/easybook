<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function welcome()
    {
        return redirect('/login');
    }  


	public function index()
    {
    	return view('login.index');
    }


	public function login(Request $request)
    {
	$this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:5|',
            'is_remember'=>'integer'
        ]);
		$user=request(['email','password']);
		$is_remember=boolval(request('is_remember'));
		if (\Auth::attempt($user,$is_remember)) {
			return redirect('posts');
		}

		return \Redirect::back()->withErrors('邮箱密码不匹配');

    }        
    public function logout()
    {
    	\Auth::logout();
    	return redirect('/login');
    }        
}
