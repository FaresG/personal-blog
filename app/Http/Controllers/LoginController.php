<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login.index');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        $remember = $credentials['remember_me'];
        unset($credentials['remember_me']);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return to_route('posts.index')->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function doRegister(AuthRegisterRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return to_route('login')->with('success', 'You\'ve been successfully registered! Login to enter website!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();;

        return to_route('login')->with('info', 'You have been logged out!');
    }

    public function confirmPassword(Request $request): RedirectResponse
    {
        if (! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return to_route('profile.edit', [
            'user' => $request->user()
        ])->with('success', 'Password updated successfully!');
    }
}
