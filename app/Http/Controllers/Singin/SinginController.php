<?php

namespace App\Http\Controllers\Singin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Home\HomeController;

class SinginController extends Controller
{
    public function show() 
    {
        return view('singin');
    }

    public function singin(Request $request) 
    {
        $user = User::where('cpf', $request->cpf)
            ->where('password', $request->password)
            ->first();
        
        if(!$user) {
            return redirect('/login')->with('status', 'Dados incorretos!');
        }
    
        unset($user->cpf);
        unset($user->password);

        return redirect()->route('home')->with('user', $user);
        //return view("home",  $user);
    }
}
