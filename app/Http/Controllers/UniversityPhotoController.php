<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversityPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityPhotoController extends Controller
{
    public function store(Request $request, University $university)
    {
        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Valider chaque fichier individuellement
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('university_photos', 'public'); // Stocker les photos dans le disque public sous un dossier university_photos
            UniversityPhoto::create([
                'university_id' => $university->id,
                'path' => $path,
            ]);
        }

        return back()->with('success', 'Photos added successfully!');
    }


    public function destroy(UniversityPhoto $photo)
    {
        Storage::delete($photo->path); // Supprimer le fichier du disque
        $photo->delete(); // Supprimer l'entrée de la base de données

        return back()->with('success', 'Photo deleted successfully!');
    }

    public function index(University $university)
    {
        $photos = $university->photos;
        return view('admin.universities.photos.index', compact('university', 'photos'));
    }

}
