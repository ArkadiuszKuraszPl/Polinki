<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateName(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        try {
            $user->updateName($request->input('name'));
            return redirect()
                ->back()
                ->with('success', 'Name updated successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Wyświetla listę wszystkich użytkowników.
     */
    public function index()
    {
        $users = User::all(); // Pobranie wszystkich użytkowników
        return view('user.index', compact('user'));
    }

    /**
     * Wyświetla profil użytkownika na podstawie slug.
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail(); // Znalezienie użytkownika po slug
        return view('user.show', compact('user'));
    }
}
