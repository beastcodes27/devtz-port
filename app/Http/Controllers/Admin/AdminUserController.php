<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    /**
     * Display a listing of mission control admin operators.
     */
    public function index(): View
    {
        $admins = User::latest()->paginate(15);

        return view('admin.users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin operator.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created admin operator in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $admin = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin operator '.$admin->name.' ('.$admin->email.') created successfully.');
    }

    /**
     * Remove the specified admin operator from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if (Auth::id() === $user->id) {
            return back()->withErrors(['error' => 'You cannot terminate your own active admin session.']);
        }

        $name = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin operator '.$name.' was removed.');
    }
}
