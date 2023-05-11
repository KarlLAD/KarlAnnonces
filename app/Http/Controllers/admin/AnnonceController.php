<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Annonces;
use App\Models\Categories;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        $annonces = Annonces::orderBy('nom', 'desc')->get();
        // dd($annonces);
        $categories = Categories:: all();

        return view('admin.annonce.index', compact('annonces', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $annonces = new Annonces;
        $annonces->nom = $request->annonce_name;
        $annonces->description = $request->annonce_description;
        $annonces->prix = $request->annonce_prix;
        $annonces->image = $request->image;
        $annonces->save();
        return redirect('admin.annonce.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $annonces = new Annonces;

        $annonces->nom = $request->annonce_name;
        $annonces->description = $request->annonce_description;
        $annonces->prix = $request->annonce_prix;
        $annonces->image = $request->annonce_image;
        $annonces->category_id = 1;
        $annonces->user_id = 1;

        // $categories = Categories::orderBy('nom', 'desc')->get();

        // $categories->nom = $request->categories_nom ;
        // $categories->id = $request->categories_id ;

        $annonces->save();
        return redirect('admin.annonce.index', compact('annonces'));
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
    public function delete(string $id)
    {
        //
        $deleteAnnonce = Annonces::findOrFail($id); // Récupère l'annonce correspondant à l'ID
        $deleteAnnonce->delete(); // Supprime l'annonce de la base de données

        return redirect()->route('admin.annonce.index')->with('success', "L'Annonce a été supprimée avec succès."); // Redirige vers la liste des annonces avec un message de succès
    }
}
