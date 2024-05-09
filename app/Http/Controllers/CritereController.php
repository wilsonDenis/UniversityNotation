<?php

namespace App\Http\Controllers;

use App\Models\Critere;
use Illuminate\Http\Request;

class CritereController extends Controller
{
    public function index()
    {
        $criteres = Critere::all();
        return view('admin.criteres.index', compact('criteres'));
    }

    public function create()
    {
        return view('admin.criteres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Critere::create($request->all());

        return redirect()->route('critere.index')->with('success', 'Critere created successfully!');
    }

    public function show(Critere $critere)
    {
        return view('admin.criteres.show', compact('critere'));
    }

    public function edit(  Critere $critere)
    {
        return view('admin.criteres.edit', compact('critere'));
    }

    public function update(Request $request, Critere $critere)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $critere->update($request->all());

        return redirect()->route('critere.index')->with('success', 'Critere updated successfully!');
    }

    public function destroy(Critere $critere)
    {
        $critere->delete();

        return redirect()->route('critere.index')->with('success', 'Critere deleted successfully!');
    }
}
