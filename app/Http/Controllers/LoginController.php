<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class LoginController extends Controller
{
    
    public function login(Request $request) {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
       ]);

       $credentials = $request->only('email', 'password');
    
       $userEmail = User::where('email', $credentials['email'])->first();
    //    echo '<pre>';
    //    print_r($userEmail);
    //     die('Demon');
		if(!$userEmail) {
			return redirect('/')->withErrors('Users does not exists');
		} else {
			if(Hash::check($credentials['password'], $userEmail['password'])) { 
				$checkuser = \Auth::attempt($credentials);
				if($checkuser) {
                    $user =  \Auth::user();
                    $user_type = $user->type;
                    
                    if($user_type == 'admin') {
					    return redirect('/admin/dashboard');
                    } 
                    // elseif($user_type == 'premium') {
					// 	$subscription_details = Subscription::where('company_id',$user->company_id)->count();
					// 	if($subscription_details > 0) {
					// 	return redirect('/company/dashboard');
					// 	} else {
					// 	return redirect('/')->withErrors('Your Subscription package expired');
					// 	}
                    // } 
                    else {
						return redirect('/')->withErrors('You are not authorized for admin access');
					}
				}
				return redirect('/')->withErrors('Congrats!..all credentials are matched');
			} else {
				return redirect('/')->withErrors('Invalid Password');
			}
		} 
    }
    
    public function logout(Request $request)
    {
    	\Auth::logout();
  		return redirect('/');
    }
}
