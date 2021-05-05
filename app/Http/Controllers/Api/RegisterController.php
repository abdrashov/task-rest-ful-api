<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required|unique:users|max:191',
			'password' => 'required|min:4|confirmed'
		]);

		User::create([
			'name' => $request->name,
			'password' => Hash::make($request->password)
		]);

		return response()->json([
			'message' => 'User created successfully.'
		], 201);
	}

}
