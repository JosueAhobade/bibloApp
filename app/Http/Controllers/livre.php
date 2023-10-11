<?php

namespace App\Http\Controllers;

use App\Models\Livre as Livres;
use App\Models\Emprunt as Emprunts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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

    public function afficher_livre()
    {
        // $livre = Livres::latest('created_at')->first();
        //  return view('users.index' ,['livre'=>$livre]);

        // $livre = DB::table('livres')
        // ->join('emprunts', function($join) {
        // $join->on(1, '=', 1); // Join without a specific condition
        // })
        // ->select('livres.*', 'emprunts.*')
        // ->orderBy('created_at','desc')
        // ->get();

        // $livre = DB::table('livres')
        // ->crossJoin('emprunts')
        // ->select('livres.*', 'emprunts.*')
        // ->get();


        $livre = Livres::orderBy('created_at','desc')
        ->get();
        //$livre_all = Livres::all();
          return view('users.index' ,['livre'=>$livre]);
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
            'livre_image'=>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1500,max_height=1500',
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

    public function editEmprunt(string $id)
    {
        $model=livres::find($id);
       
       return view('users.shopping-cart',['model'=>$model]);
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

    public function ajout_emprunt(Request $request)
    {
        $emprunt = livres::find($request->input('idLivre'));

        $emprunt->dateEmprunt = now();

        $emprunt->dateRemise =$request->input('dateRemise');

        $emprunt->idEtu = Auth()->user()->id;

        $emprunt->disponible = 1;

        $emprunt->save();


         return Redirect::to('/user/index');
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
