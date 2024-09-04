<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\ville;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $etudiantDetails = etudiant::all();
    $etudiantDetails = etudiant::select()
    ->paginate(10);
    return view('etudiant.index', ['etudiantDetails' => $etudiantDetails]);
  }

    /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $villes = ville::all();
    return view('etudiant.create', ['villes' => $villes]);
  }

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    //insert -> lastid  => select where lastId
    $newEtudiant = etudiant::create([
      'name' => $request->name,
      'address' => $request->address,
      'phone' => $request->phone,
      'email' => $request->email,
      'birthdate' => $request->birthdate,
      'ville_id' => $request->ville_id,
    ]);

    return redirect(route('etudiant.show', $newEtudiant->id));
  }


    /**
   * Display the specified resource.
   *
   * @param  \App\Models\etudiant $etudiantDetail
   * @return \Illuminate\Http\Response
   */
  public function show(etudiant $etudiantDetail)
  {
    //select * from etudiant_posts where id = $etudiantDetail" 
    return view('etudiant.show', ['etudiantDetail' => $etudiantDetail]);
  }

    /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\etudiant $etudiantDetail
   * @return \Illuminate\Http\Response
   */
  public function edit(etudiant $etudiantDetail)
  {
    $villes = ville::all();
    return view('etudiant.edit', ['etudiantDetail' => $etudiantDetail, 'villes' => $villes]);
  }

    /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\etudiant $etudiantDetail
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, etudiant $etudiantDetail)
  {
    $etudiantDetail->update([
      'name' => $request->name,
      'address' => $request->address,
      'phone' => $request->phone,
      'email' => $request->email,
      'birthdate' => $request->birthdate,
      'ville_id' => $request->ville_id,
    ]);

    return redirect(route('etudiant.show', $etudiantDetail->id));
  }

    /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\etudiant  $etudiantDetail
   * @return \Illuminate\Http\Response
   */
  public function destroy(etudiant $etudiantDetail)
  {
    $etudiantDetail->delete();

    return redirect(route('etudiant.index'));
  }

}