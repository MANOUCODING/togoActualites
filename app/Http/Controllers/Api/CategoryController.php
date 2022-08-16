<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::get();

            return $this->sendResponse($categories, 'Liste de toutes les categories.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'categoryName' => ['required', 'string', 'unique:categories' ,'max:255'],
            'sousCategoryBoolean' => ['integer'],
        ],[
            'categoryName.required' => 'La :attribute est obligatoire.'
        ], [
            'categoryName' => 'catégorie'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['categoryName']) && !empty($datas['categoryName'])) {

            $datas['slug'] = Hash::make($datas['categoryName']);

        }

        $category = Category::create([
            'categoryName' => $datas['categoryName'],
            'slug' =>  $datas['slug'],
            'sousCategoryBoolean' =>  $datas['sousCategoryBoolean']
        ]);

        return $this->sendResponse($category, 'Votre catégorie a ete créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $categoryShow = Category::findOrFail($id);

            return $this->sendResponse($categoryShow, 'Votre catégorie a été selectionnée.');

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune catégrie trouvée.');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'categoryName' => ['required', 'string', 'max:255'],
        ],[
            'categoryName.required' => 'La :attribute est obligatoire.'
        ], [
            'categoryName' => 'catégorie'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['categoryName']) && !empty($datas['categoryName'])) {

            $datas['slug'] = Hash::make($datas['categoryName']);

        }

        $category = Category::findOrFail($id);

        $category->update($datas);

        return $this->sendResponse($category, 'Votre catégorie a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return $this->sendResponse($category, "La categorie a été supprimée avec succès.");
    }
}
