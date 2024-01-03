<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'users' => User::all(),
        ]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password ?? '12345678'),
            'role' => $request->role,
        ]);

        // Flash a success message to the session
        session()->flash('success', 'User has been successfully added.');

        return redirect('/register');
    }

    public function edit(User $user): View
    {
        return view('auth.update', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validatedData = $request->validate([
            'is_active' => ['required', 'string', 'max:255'],
            'role' => 'required',
        ]);

        User::where('id', $user->id)
            ->update($validatedData);

        session()->flash('success', 'User has been successfully updated.');

        return redirect('/register');
    }
}
