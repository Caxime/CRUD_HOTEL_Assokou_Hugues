<?php

namespace App\Http\Controllers;


// app/Http/Controllers/ChambreController.php

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index()
    {
        // Afficher toutes les chambres
        $chambres = Chambre::all();
        return view('chambres.index', compact('chambres'));
    }
    // app/Http/Controllers/ChambreController.php

public function __construct()
{
    $this->middleware('checkNombreChambres')->only('destroy');
}


    public function create()
    {
        // Afficher le formulaire de création
        return view('chambres.create');
    }

    public function store(Request $request)
    {
        // Enregistrement d'une chambre
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'lits' => 'required|integer',
            // ... autres règles de validation ...
        ]);

        Chambre::create($request->all());

        return redirect()->route('chambres.index')
            ->with('success', 'Chambre enregistrée avec succès');
    }

    public function show($id)
    {
        // Affichage des informations essentielles d'une chambre
        $chambre = Chambre::findOrFail($id);
        return view('chambres.show', compact('chambre'));
    }

    public function edit($id)
    {
        // Afficher le formulaire de modification
        $chambre = Chambre::findOrFail($id);
        return view('chambres.edit', compact('chambre'));
    }

    public function update(Request $request, $id)
    {
        // Modification des informations d'une chambre
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'lits' => 'required|integer',
            // ... autres règles de validation ...
        ]);

        $chambre = Chambre::findOrFail($id);
        $chambre->update($request->all());

        return redirect()->route('chambres.index')
            ->with('success', 'Chambre modifiée avec succès');
    }

    public function destroy($id)
    {
        // Suppression d'une chambre (ajouter le middleware ici)
        $chambre = Chambre::findOrFail($id);
        $chambre->delete();

        return redirect()->route('chambres.index')
            ->with('success', 'Chambre supprimée avec succès');
    }
}


