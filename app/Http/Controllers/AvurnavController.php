<?php

namespace App\Http\Controllers;

use App\Models\Avurnav;
use Illuminate\Http\Request;

class AvurnavController extends Controller
{
    public function create()
    {
        return view('avurnav.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'avurnav_local' => 'required|string',
            'ile' => 'required|string',
            'vous_signale' => 'required|string',
            'position' => 'required|string',
            'navire' => 'required|string',
            'pob' => 'required|integer',
            'type' => 'required|string',
            'caracteristiques' => 'required|string',
            'zone' => 'required|string',
            'derniere_communication' => 'required|date',
            'contacts' => 'required|string',
        ]);

        // Enregistrement dans la base de données
        Avurnav::create($validatedData);

        return redirect()->back()->with('success', 'Données enregistrées avec succès.');
    }
}
