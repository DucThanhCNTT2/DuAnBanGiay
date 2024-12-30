<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NDT_QUAN_TRICotroller extends Controller
{
    //

    //GET: login (authentication)
    public function ndtLogin(){
        return view('NdtLogin.ndt-login');
    }

    //POST: login (authentication)
    public function ndtLoginSubmit(Request $request){
        return view('NdtLogin.ndt-login');
    }
}
