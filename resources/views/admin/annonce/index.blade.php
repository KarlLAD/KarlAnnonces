@extends('layouts.admin')

@section('main')

<!-- Sélectionner une catégorie -->

<form action=" {{route('admin.category.index')}}" method="post">
    <div class="mb5">

        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner une catégorie</label>
        <select id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option selected>Choisir une catégorie</option>


            @foreach ($categories as $itemCategory)

            <option value="{{$itemCategory->id}}" selected> {{$itemCategory->nom}}</option>

            @endforeach

            <!--  if simplifié  -->



        </select>
    </div>
</form>

<!-- component -->


<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-gray-400">
    Annonce</h1>

<!-- Entrez l'annonce -->

<form action="{{ route('admin.annonce.store') }}" method="post" class="w-full max-w-lg">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-Annonce">
                Nom de l'annonce
            </label>
            <input name="annonce_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-Annonce" type="text" placeholder="Annonce">
            <p class="text-red-500 text-xs italic">S'il vous plait Entrer un nom pour l'annonce.</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Entez une image</label>
        <input id="file_input" type="file" name="annonce_image" placeholder="Ajouter une image" class="w-full rounded-md boder-orange-600 bg-gray-100 py-3 px-3">
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Description
            </label>
            <textarea name="annonce_description" class=" block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="description"></textarea>
            <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Prix
            </label>
            <input name="annonce_prix" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prix" type="float">
            <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p>
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-full">
            <button type="submit" class="shadow bg-blue-700 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Ajouter
            </button>
        </div>
        <div class="md:w-2/3"></div>
    </div>
</form>

@endsection
