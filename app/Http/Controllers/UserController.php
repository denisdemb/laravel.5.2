<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;



use App\Http\Requests;

class UserController extends Controller
{


    public function __construct()
    {
       $this->middleware('role:admin');
    }


}
