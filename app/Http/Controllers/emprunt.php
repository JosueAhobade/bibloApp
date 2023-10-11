<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre ;
use App\Models\Emprunt as Emprunts;
use Illuminate\Support\Facades\Redirect;

class emprunt extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emprunt = new Emprunts([
            'dateEmprunt' =>now(),
            'dateRemise' =>$request->input('dateRemise'),
            'auteur' => $request->input('auteur'),
            'idEtu' => Auth()->user()->id,
            'idLivre' => $request->input('idLivre'),
            'statut' => 1  
        ]);
        $emprunt->save();

         return Redirect::to('/user/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model=livre::find($id);
       
       return view('users.shopping-cart',['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
