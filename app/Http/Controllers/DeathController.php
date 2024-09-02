<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Death;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DeathController extends Controller
{
    public function create()
    {
        // Récupérer tous les patients
        $patients = User::where('role', 'patient')->get();
        return view('admin.declare_death', compact('patients'));
    }

    public function store(Request $request)
    {
        // Valider les entrées
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'death_date' => 'required|date|before_or_equal:today',
            'death_time' => 'nullable|date_format:H:i',
            'place_of_death' => 'required|string|max:255',
            'cause_of_death' => 'nullable|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'certification_date' => 'nullable|date|before_or_equal:today',
        ]);

        // Créer un nouveau décès avec les champs supplémentaires
        Death::create([
            'user_id' => $request->user_id,
            'death_date' => $request->death_date,
            'death_time' => $request->death_time,
            'place_of_death' => $request->place_of_death,
            'cause_of_death' => $request->cause_of_death,
            'doctor_name' => $request->doctor_name,
            'certification_date' => $request->certification_date,
        ]);

        return redirect()->back()->with('success', 'Décès déclaré avec succès.');
    }

    public function index()
    {
        // Récupérer tous les décès
        $deaths = Death::all();
        return view('admin.index', compact('deaths'));
    }

    public function show($id)
    {
        $death = Death::findOrFail($id);
        return view('admin.show', compact('death'));
    }

    public function getPhotoUrl($id)
    {
        $patient = User::find($id);

        // Vérifiez si la photo existe
        if ($patient && $patient->passport_photo) {
            $imagePath = storage_path('app/public/passport_photos/' . $patient->passport_photo);

            // Convertir l'image en base64
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
            $base64Image = 'data:image/' . $imageType . ';base64,' . $imageData;

            return response()->json(['photoUrl' => $base64Image]);
        }

        return response()->json(['photoUrl' => null], 404);
    }

    public function edit($id)
    {
        $death = Death::findOrFail($id);
        $patients = User::where('role', 'patient')->get();
        return view('admin.edite', compact('death', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'death_date' => 'required|date|before_or_equal:today',
            
            'death_time' => 'nullable|date_format:H:i',
            'place_of_death' => 'required|string|max:255',
            'cause_of_death' => 'nullable|string|max:255',
            'certification_date' => 'nullable|date|before_or_equal:today',
        ]);

        $death = Death::findOrFail($id);
        $death->update($request->all());

        return redirect()->route('deaths.index')->with('success', 'Décès mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $death = Death::findOrFail($id);
        $death->delete();

        return redirect()->route('deaths.index')->with('success', 'Décès supprimé avec succès.');
    }
}
