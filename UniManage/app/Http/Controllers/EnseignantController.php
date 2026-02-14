<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Helpers\ColorHelper;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::paginate(9);
        $totalEnseignants = Enseignant::count();
        $enseignantsActifs = Enseignant::where('statut', 'actif')->count();
        $enseignantsEnConge = Enseignant::where('statut', 'inactif')->count();
        $enseignantsNouveaux = Enseignant::whereMonth('created_at', now()->month)->count();

        return view('enseignants.list', compact('enseignants', 'totalEnseignants', 'enseignantsActifs', 'enseignantsEnConge', 'enseignantsNouveaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants,email',
            'telephone' => 'nullable|string|max:20',
            'grade' => 'required|string|max:100',
            'departement' => 'required|string|max:100',
        ],[
            'prenom.required' => 'Le prénom est obligatoire',
            'nom.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être valide',
            'email.unique' => 'Cet email est déjà utilisé',
            'grade.required' => 'Le titre/grade est obligatoire',
            'departement.required' => 'Le département est obligatoire',
        ]);

        $validatedData['statut'] = $request->has('statut') ? 'actif' : 'inactif';

        Enseignant::create($validatedData);

        return back()->with('success', 'Enseignant créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        $color = ColorHelper::getAvatarColor($enseignant->nom . $enseignant->prenom);
        return view('enseignants.show', compact('enseignant', 'color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        return view('enseignants.edit', compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants,email,' . $enseignant->id,
            'telephone' => 'nullable|string|max:20',
            'grade' => 'required|string|max:100',
            'departement' => 'required|string|max:100',
        ],[
            'prenom.required' => 'Le prénom est obligatoire',
            'nom.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être valide',
            'email.unique' => 'Cet email est déjà utilisé',
            'grade.required' => 'Le titre/grade est obligatoire',
            'departement.required' => 'Le département est obligatoire',
        ]);

        $validatedData['statut'] = $request->has('statut') ? 'actif' : 'inactif';

        $enseignant->update($validatedData);

        return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();
        return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès.');
    }
}
