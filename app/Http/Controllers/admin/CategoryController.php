<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //afficher mes catégorie à l'aide d'une requête sql
        $categories = Categories::orderBy('updated_at', 'DESC')->get();
        // dd($categories);
        return view('admin.category.index', compact(
            'categories',
        ));
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
        //ajouter une categorie
        $category = new Categories ;
        $category->nom = $request->category_name;
        $category->save();

        return redirect()->route('admin.category.index');

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
    public function edit(Request $request, string $id)
    {
        //modifier une catégorie

        // Je récupère un objet par rapport à son id à l'aide d'une requête SQL
        $editCategory = Categories::findOrFail($id) ;

        $editCategory->nom = $request->category_edit;

        $editCategory->save();

        return redirect()->route('admin.category.index');


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
        $deleteCategory = Categories::findOrFail($id); // Récupère la catégorie correspondant à l'ID
        $deleteCategory->delete(); // Supprime la catégorie de la base de données

        return redirect()->route('admin.category.index')->with('success', 'La catégorie a été supprimée avec succès.'); // Redirige vers la liste des catégories avec un message de succès
    }
}
