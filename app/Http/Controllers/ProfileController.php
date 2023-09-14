<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(protected Request $request)
    {
    }

    // View other profiles
    public function view(User $user): View|RedirectResponse
    {
        if ($user->id === $this->request->user()->id) {
            return to_route('profile.index');
        }

        return view('profile.index',[
            'user' => $user
        ]);
    }

    public function index(): View
    {
        return view('profile.index', [
            'user' => $this->request->user()
        ]);
    }

    public function edit(): View
    {
        return view('profile.edit', [
            'user' => $this->request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return to_route('profile.edit', [
            'user' => $request->user()
        ])->with('success', 'Profile Informations updated successfully!');
    }
}
