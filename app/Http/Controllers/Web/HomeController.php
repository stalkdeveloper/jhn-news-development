<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try {
            return view('home');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
