<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversityPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    //// Affiche la liste de toutes les universités
    

    public function index()
    {
        $universities = University::all();
        Log::info('Universities:', ['data' => $universities]);

        

        if (Auth::user() && Auth::user()->role === 'admin') {
        
            return view('admin.universities.index', compact('universities'));
        } else {
            
            return view('dashboard', compact('universities'));
        }
    }

    // Montre le formulaire pour créer une nouvelle université
    public function create()
    {
        return view('admin.universities.create');
    }

    // Stocke une nouvelle université dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'photos' => 'required|array|size:2', // S'assure que deux photos sont fournies
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Validation des photos avec une limite de 5 Mo
        ]);

        DB::beginTransaction();
        try {
            $university = new University();
            $university->name = $request->name;
            $university->description = $request->description;
            $university->location = $request->location;
            $university->save();

            foreach ($request->file('photos') as $file) {
                $path = $file->store('university_photos', 'public');
                $photo = new UniversityPhoto();
                $photo->university_id = $university->id;
                $photo->path = $path;
                $photo->save();
            }
            DB::commit();
            return redirect()->route('university.index')->with('success', 'University created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to create university: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('An error occurred while creating the university. Please check the logs for more details.');
        }
    }

    
    public function showDetails(University $university)
    {
      
        $university->load('ratings');

 
        $rating = $university->ratings->avg('score') ?? 0; 

        return view('details', compact('university', 'rating'));
    }




    // Affiche les détails d'une université 
    public function show(University $university)
    {
        return view('admin.universities.show', compact('university'));
    }

    // Montre le formulaire pour éditer une université existante
    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    // Met à jour une université spécifique dans la base de données
    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $university->update($request->all());

        return redirect()->route('university.index')->with('success', 'University updated successfully!');
    }

    // Supprime une université de la base de données
    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('university.index')->with('success', 'University deleted successfully!');
    }
}
