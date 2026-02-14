<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantISController extends Controller
{
    public function index()
    {

        return redirect()->route('etudiants.list');
    }

    public function list()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.list', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $validator = Etudiant::validateCreate($request->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $statut = $request->has('statut') ? true : false;
        $data = array_merge($validator->validated(), ['statut' => $statut]);

        Etudiant::create($data);

        return redirect()->route('etudiants.list')->with('toast', [
            'type' => 'success',
            'title' => 'Étudiant ajouté !',
            'description' => 'L\'étudiant ' . $data['nom'] . ' a été ajouté avec succès.'
        ]);
    }

    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, string $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $validator = Etudiant::validateUpdate($request->all(), $id);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $statut = $request->has('statut') ? true : false;
        $data = array_merge($validator->validated(), ['statut' => $statut]);

        $etudiant->update($data);

        return redirect()->route('etudiants.list')->with('toast', [
            'type' => 'success',
            'title' => 'Étudiant mis à jour !',
            'description' => 'Les informations ont été mises à jour avec succès.'
        ]);
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.list')->with('toast', [
            'type' => 'success',
            'title' => 'Étudiant supprimé !',
            'description' => 'L\'étudiant ' . $etudiant->nom . ' a été supprimé avec succès.'
        ]);
    }
}
