<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\JwtController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends JwtController
{
	public function login(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:191',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json([
			      'status'   => 'error',
			      'message'  => $validator->getMessageBag()
			   ], 422);
		}

		if (!$token = Auth::attempt($request->only('name', 'password'))){
         return response()->json([
				   'status'   => 'error',
	         	'message' => ['wrong' => ['The provided credentials are incorect']]
	         ], 422);
		}
    	
    	return response()->json(['token' => $token], 200);
	}

	public function refresh() {
		try {
			$token = auth()->refresh();
		} catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
			return response()->json([
				'status'   => 'error',
				'message' => $e->getMessage()
			], 401);
		}
		return response()->json(['token' => $token], 200);
	}
}
