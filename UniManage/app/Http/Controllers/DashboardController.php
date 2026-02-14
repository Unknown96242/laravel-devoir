<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;

class DashboardController extends Controller
{
    public function index()
    {

        $enseignants = Enseignant::all()->count();

        return view('dashboard', compact('enseignants'));
    }

    public function statistiques()
    {
        return view('statistiques');
    }
}
