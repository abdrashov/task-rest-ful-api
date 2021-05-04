<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		return UsersResource::collection(User::all());
	}

}
