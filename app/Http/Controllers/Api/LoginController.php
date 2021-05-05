<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		$request->validate([
			'name' => 'required|max:191',
			'password' => 'required',
		]);

		if (Auth::attempt($request->only('name', 'password'))){
			return response()->json(Auth::user(), 200);
		}
		
		throw ValidationException::withMessages([
			'name' => ['The provided credentials are incorect.']
		]);
	}
}
