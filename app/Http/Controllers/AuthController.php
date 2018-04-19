<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            return view("home");
        } catch (Exception $e) {
        }
    }
    public function login(Request $request)
    {
      try {
        return view("login");
      } catch (Exception $e) {
      }
    }

    public function register(Request $request)
    {
      try {
        return view('register');
      } catch (Exception $e) {
      }
    }

    public function createUser(Request $request)
    {
    	try {
    		$validator = Validator::make(
            	$request->all(),
	            [
	            'email' => 'required | email',
	            'password' => 'required',
	            'name' => 'required'
	            ],
	            [
	            'email.required' => 'Email address is required',
	            'email.email' => 'Valid email address is required',
	            'name.required' => 'Name is required',
	            'password.required' => 'Password is required'
	            ]
	        );
			if ($validator->fails())
		        return redirect()->back()->withErrors($validator);
    		$user = User::create([
            	'name' => $request->input('name'),
            	'email' => $request->input('email'),
            	'password' => Hash::make($request->input('password')),
        	]);
        	if($user)
        		return redirect()->route('dashboard');
        	else
        		return redirect()->back()->withInput();
    	} catch (Exception $e) {
    	}
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function checkLogin(Request $request)
    {
    	try {
    		$validator = Validator::make(
            	$request->all(),
	            [
	            'email' => 'required | email',
	            'password' => 'required'
	            ],
	            [
	            'email.required' => 'Email address is required',
	            'email.email' => 'Valid email address is required',
	            //'confirmation_email.exists' => 'Email address does not exist',
	            'password.required' => 'Password is required'
	            ]
	        );
			if ($validator->fails())
		        return redirect()->back()->withErrors($validator);
    		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
    			return redirect()->route('dashboard');
    		else
    			return redirect()->back()->withInput();
    	} catch (Exception $e) {
    	}
    }
}
