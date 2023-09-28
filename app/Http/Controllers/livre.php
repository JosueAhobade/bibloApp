<?php

namespace App\Http\Controllers;

use App\Models\livre as Livres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class livre extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livre = Livres::All();
        return view('Admin.livres' ,['livre'=>$livre]);
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
        $request->validate([
            'name'=>'required',
            'auteur'=>'required',
            'date_parution'=>'required',
            'auteur'=>'required'
        ]);

        $livre = new Livres();

        $livre->name = $request->input('name');

        $livre->auteur = $request->input('auteur');

        $livre->date_parution = $request->input('date_parution');

        $livre->save();


        return Redirect::to('/ajout-livre');
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
        //
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
