<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\JwtController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends JwtController
{
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|unique:users|max:191',
			'password' => 'required|min:4|confirmed'
		]);

		if ($validator->fails()) {
			return response()->json([
			      'status'   => 'error',
			      'message'  => $validator->getMessageBag()
			   ], 422);
		}
		
		User::create([
			'name' => $request->name,
			'password' => Hash::make($request->password)
		]);

		return response()->json([
			'message' => 'User created successfully.'
		], 201);
	}

}
