<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('categorie')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'statut' => 'required|string|in:publie,brouillon',
            'categorie_id' => 'required|exists:categories,id',
        ], [
            'titre.required' => 'Le titre est obligatoire',
            'titre.max' => 'Le titre ne peut pas dépasser 255 caractères',
            'contenu.required' => 'Le contenu est obligatoire',
            'statut.required' => 'Le statut est obligatoire',
            'statut.in' => 'Le statut doit être soit "publié" soit "brouillon"',
            'categorie_id.required' => 'La catégorie est obligatoire',
            'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas',
        ]);

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('categorie');
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'statut' => 'required|string|in:publie,brouillon',
            'categorie_id' => 'required|exists:categories,id',
        ], [
            'titre.required' => 'Le titre est obligatoire',
            'titre.max' => 'Le titre ne peut pas dépasser 255 caractères',
            'contenu.required' => 'Le contenu est obligatoire',
            'statut.required' => 'Le statut est obligatoire',
            'statut.in' => 'Le statut doit être soit "publié" soit "brouillon"',
            'categorie_id.required' => 'La catégorie est obligatoire',
            'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas',
        ]);

        $article->update($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
