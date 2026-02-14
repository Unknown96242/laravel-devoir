<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ],[
            'titre.required' => 'Le ntitreom est obligatoire',
            'contenu.required' => 'Le contenu est obligatoire',
            'statut.required' => 'Le statut est obligatoire',

        ]);

        Article::create($validatedData);

        return back()->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string|max:255',
            'statut' => 'required|string|max:255',



        ],[
            'titre.required' => 'Le ntitreom est obligatoire',
            'contenu.required' => 'Le contenu est obligatoire',
            'statut.required' => 'Le statut est obligatoire',

        ]);

        Article::update($validatedData);

        return redirect()->route('articles.index')->with('success', 'Articles mis à jour avec succès.');
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
