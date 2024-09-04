<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
  public function index()
  {
      $etudiantDetails = etudiant::paginate(10);
      $etudiantDetail = new Etudiant();
      return view('etudiant.index', ['etudiantDetails' => $etudiantDetails, 'etudiantDetail' => $etudiantDetail]);
  }

  public function create()
  {
    $villes = Ville::all();
    return view('etudiant.create', ['villes' => $villes]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'phone' => 'required|phone|digits_between:8,15',
      'email' => 'required|string|email|unique:etudiants|max:255',
      'birthdate' => 'required|date|before:today',
      'ville_id' => 'required|integer|exists:villes,id',
    ]);

    $newEtudiant = Etudiant::create($validatedData);

    return redirect(route('etudiant.show', $newEtudiant->id));
  }

  public function show(Etudiant $etudiantDetail)
  {
    return view('etudiant.show', ['etudiantDetail' => $etudiantDetail]);
  }

  public function edit(Etudiant $etudiantDetail)
  {
    $villes = Ville::all();
    return view('etudiant.edit', ['etudiantDetail' => $etudiantDetail, 'villes' => $villes]);
  }

  public function update(Request $request, Etudiant $etudiantDetail)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'phone' => 'required|phone|digits_between:8,15',
      'email' => 'required|email|unique:etudiants|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
      'birthdate' => 'required|date|before:today',
      'ville_id' => 'required|integer|exists:villes,id',
    ]);

    $etudiantDetail->update($validatedData);

    return redirect(route('etudiant.show', $etudiantDetail->id));
  }

  public function destroy(Etudiant $etudiantDetail)
  {
    $etudiantDetail->delete();

    return redirect(route('etudiant.index'));
  }
}
