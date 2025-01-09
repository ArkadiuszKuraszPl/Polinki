<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('links.index', [
            'links' => Link::where('user_id', auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'logo' => 'required',
            'url' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'age_restricted' => 'nullable',
        ]);

        Link::create([
            'user_id' => auth()->id(),
            'logo' => $request->logo,
            'url' => $request->url,
            'title' => $request->title,
            'description' => $request->description,
            'age_restricted' => $request->age_restricted ?? 0, // Domyślnie 0, jeśli nie zaznaczono
        ]);

        return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
