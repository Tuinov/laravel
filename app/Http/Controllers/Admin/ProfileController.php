<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public function update(Request $request)
    {

        $user = \Auth::user();

        if($request->isMethod('post')) {

//            $this->validate($request, User::rules());

            if(Hash::check($request->post('password'), $user->password)) {
                $user->fill()->save();
            }
        }

        //dd($user);
        return view('admin.profile', ['user' => $user]);
    }
}
