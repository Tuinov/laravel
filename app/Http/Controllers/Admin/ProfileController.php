<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected function validateRules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,' . \Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|min:3',
        ];
    }

    protected function attributeNames()
    {
        return [
            'newPassword' => 'новый пароль'
        ];
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }


    public function update(Request $request)
    {

        $user = \Auth::user();

        if ($request->isMethod('post'))
        {
            $this->validate($request,
                $this->validateRules(), [],
                $this->attributeNames()
            );

            if (Hash::check($request->post('password'), $user->password))
            {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword')),
                ])->save();

                return redirect('profile')->with(['success' => 'Данные успешно изменены!']);

            } else {
                $errors['password'][] = 'Неверно введён текущий пароль!!';
                return redirect('profile')->withErrors($errors);

            }
        }
        //dd($user);
        return view('admin.profile', ['user' => $user]);
    }
}
