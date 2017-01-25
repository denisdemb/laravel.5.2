<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;



class ProductsController extends Controller
{
    public function index(){


        return view('products',[]);
        
    }
}
