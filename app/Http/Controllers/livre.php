<?php

namespace App\Http\Controllers;

use App\Models\Livre as Livres;
use App\Models\Emprunt as Emprunts;
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
        return view('Admin.index' ,['livre'=>$livre]);
    }

    public function livre_disponible()
    {
      $livreDisponible = Emprunts::join('livres','livres.id','=','emprunts.idLivre')
        ->select('emprunts.*','livres.*')
        ->where('emprunts.statut', '0')
        ->get();
        // a rechercher . comment faire une recherche a partir d'une liste d'objets
        return view('Admin.disponible' ,['livreDisponible'=>$livreDisponible]);
    }

    public function livre_en_pret()
    {
        $livreEnPret = Emprunts::join('livres','livres.id','=','emprunts.idLivre')
        ->select('emprunts.*','livres.*')
        ->where('emprunts.statut', '1')
        ->get();
        // a rechercher . comment faire une recherche a partir d'une liste d'objets
        return view('Admin.pret' ,['livreEnPret'=>$livreEnPret]);
    }

    public function utilisateurs()
    {
        $utilisateurs = Emprunts::select('idLivre')
        ->where('emprunts.statut', '0')
        ->get();
        // a rechercher . comment faire une recherche a partir d'une liste d'objets
        return view('Admin.index' ,['livre'=>$livre]);
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
            'titre'=>'required',
            'auteur'=>'required',
            'date_pub'=>'required',
            'maison_edition'=>'required',
            'langue'=>'required',
            'livre_image'=>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'description'=>'required',
        ]);

        $file_name = time() . '.' . request()->livre_image->getClientOriginalExtension();
        request()->livre_image->move(public_path('images'), $file_name);

        $livre = new Livres([
            'titre' => $request->input('titre'),
            'auteur' => $request->input('auteur'),
            'date_pub' => $request->input('date_pub'),
            'maison_edition' => $request->input('maison_edition'),
            'langue' => $request->input('langue'),
            'livre_image' => $file_name,
            'description' => $request->input('description')
        ]);
        $livre->save();

        // $livre = new Livres();

        // $livre->titre = $request->input('titre');

        // $livre->auteur = $request->input('auteur');

        // $livre->date_pub = $request->input('date_pub');

        // $livre->maison_edition = $request->input('maison_edition');

        // $livre->langue = $request->input('langue');

        // $livre->description = $request->input('description');

        // $livre->save();


        return Redirect::to('/index');
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
         $model=livres::find($id);
       
       return view('Admin.modif-livre',['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $livre_modif=livres::find($request->input('id_livre'));
        
        $livre_modif->titre=$request->input('titre');

        $livre_modif->auteur=$request->input('auteur');

        $livre_modif->date_pub=$request->input('date_pub');

        $livre_modif->maison_edition=$request->input('maison_edition');

        $livre_modif->langue=$request->input('langue');

        $livre_modif->description=$request->input('description');

        $livre_modif->save();

            return Redirect::to('/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = livres::where('id',$id)->delete();
        return redirect()->back()->withStatus(__('Suppresion réussi avec succès'));
    }
}
