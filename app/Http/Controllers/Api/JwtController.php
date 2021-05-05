<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JwtController extends Controller
{
	public function __construct() {
		Auth::setDefaultDriver('api');
	}
}
