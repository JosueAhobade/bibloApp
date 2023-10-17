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
      $livreDisponible = livres::select('*')
        ->where('livres.disponible', '0')
        ->get();
        // a rechercher . comment faire une recherche a partir d'une liste d'objets
        return view('Admin.disponible' ,['livreDisponible'=>$livreDisponible]);
    }

    public function livre_en_pret()
    {
        $livreEnPret = Livres::select('*')
        ->where('livres.disponible', '1')
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

        $livre_all = Livres::all();

        $livre_new = Livres::orderBy('created_at','desc')
        ->take(10)
        ->get();

        $livre_best = Livres::select('*')
        ->where('nbreEmprunt', '>', 5)
        ->get();

        //$livre_all = Livres::all();
          return view('users.index' ,['livre_all'=>$livre_all,'livre_new'=>$livre_new,
            'livre_best'=>$livre_best]);
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


    public function total_emprunt()
    {
         $pret = Livres::join('users','users.id','=','livres.idEtu')
        ->select('livres.*')
        ->where('users.id', Auth()->user()->id)
        ->where('livres.disponible','=','1')
        ->get();
        // a rechercher . comment faire une recherche a partir d'une liste d'objets
        return view('users.emprunt' ,['pret'=>$pret]);
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

     public function editProlongation(string $id)
    {
        $model=livres::find($id);
       
       return view('users.prolongation',['model'=>$model]);
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


        $panier = session('panier', []);

        foreach ($panier as $id => $livre) 
        {

            $emprunt = livres::find($livre['id']);
            $emprunt->dateEmprunt = now();
            $emprunt->dateRemise =$livre['dateRemise'];
            $emprunt->idEtu = Auth()->user()->id;
            $emprunt->disponible = 1;
            $emprunt->nbreEmprunt +=$livre['quantite'];
            $emprunt->qte -= $livre['quantite'];
            $emprunt->save();


            $emprunt1 = new Emprunts();
            $emprunt1->dateEmprunt = now();
            $emprunt1->dateRemise = $livre['dateRemise'];
            $emprunt1->idEtu = Auth()->user()->id;
            $emprunt1->idLivre = $livre['id'];
            $emprunt1->statut = 1;
            $emprunt1->qte_pret = $livre['quantite'];
            $emprunt1->save();
        }

        session()->forget('panier');
        session()->save();
         return Redirect::to('/user/index');
    }

    public function ajout_prolongation(Request $request)
    {
        $emprunt = livres::find($request->input('idLivre'));
        $emprunt->dateRemise =$request->input('dateRemise');
        $emprunt->save();


         return Redirect::to('/user/detail_emprunt');
    }

    public function rendre_emprunt(Request $request)
    {
        $livre_a_rendre = livres::find($request->input('id_livre'));

        $livre_a_rendre->dateEmprunt = null;

        $livre_a_rendre->dateRemise ='';

        $livre_a_rendre->idEtu = null;

        $livre_a_rendre->disponible = null;

        $livre_a_rendre->save();


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

    public function ajouterAuPanier(string $idLivre) 
    {
            
            $livre = Livres::find($idLivre);
             $quantite_livre = $livre->qte;

            if (!$livre) {
                return redirect()->route('/user/index')->with('error', 'Produit non trouvé');
            }

            $panier = session('panier', []);
            $quantite = request('quantite', 1);

            // Vérifiez si le produit est déjà dans le panier
            if (isset($panier[$idLivre])) {
                $qte = $panier[$idLivre]['quantite'];
                if ($qte > $quantite_livre){
                   return Redirect::to('/user/panier');  
                }
                $panier[$idLivre]['quantite'] = $quantite;
            } else {
                $panier[$idLivre] = [
                    'id' =>$livre->id,
                    'titre' => $livre->titre,
                    'image_livre' => $livre->livre_image,
                    'quantite' => $quantite,
                    'dateRemise'=>''
                ];

            }

            session(['panier' => $panier]);

             return view('users.shopping-cart',['livre'=>$livre]);
    }

    public function afficherPanier() 
    {
        $panier = session('panier', []);

        // Calculez le montant total
        $nbreTotal = 0;
        foreach ($panier as $id => $livre) {
            $nbreTotal += $livre['quantite'];
        }

        return view('users.emprunt-panier', compact('panier', 'nbreTotal'));
    }

    public function mettreAJourDate() 
    {
        $panier = session('panier', []);
        $date = request('dateRemise');
        $idLivre=request('idLivre');

    
            $panier[$idLivre]['dateRemise'] = $date;
       
        

        session(['panier' => $panier]);

        return Redirect::to('/user/panier');
    }

    public function supprimerDuPanier(string $idLivre) 
    {
        $panier = session('panier', []);

        if (isset($panier[$idLivre])) {
            unset($panier[$idLivre]);
        }

        session(['panier' => $panier]);

         return Redirect::to('/user/panier');
    }




}
