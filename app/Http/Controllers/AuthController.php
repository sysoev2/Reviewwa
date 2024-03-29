<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReqisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect('/')->with('success', 'вы вошли');

        } else {
            return redirect('/')->withErrors(['message' => 'ошибка']);
        }
    }

    public function register(ReqisterRequest $request)
    {
        $data = $request->all();
        if ($data['password'] == $data['password_again'] && !User::select()->where('email', $data['email'])->first()) {
            $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => password_hash($data['password'], 1)]);
            $user->assignRole('user');
            Auth::login($user);
            return redirect('/')->with('success', 'вы зарегестировались)');
        } else {
            return redirect('/')->withErrors(['message' => 'ошибка']);
        }
    }
}
