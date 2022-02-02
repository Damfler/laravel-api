<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();

        if (auth('admin')->attempt($data))
            return redirect(route('admin.posts.index'));

        return redirect(route('admin.login'))->withErrors(['name' => 'Пользователь не найден, либо данные введены не правильно']);
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect(route('admin.login'));
    }
}
