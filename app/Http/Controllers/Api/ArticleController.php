<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $datas = $request->all();

            $validator = Validator::make($datas, [
                'title' => ['required', 'string', 'unique:articles' ,'max:255'],
                'subtitle' => ['string'],
                'content' => ['required', 'string'],
                'category_id' => ['required', 'integer'],
                'aLaUne' => ['required', 'string'],
                'publish' => ['required', 'string'],
            ],[
                'title.required' => 'Le :attribute est obligatoire.'
            ], [
                'title' => 'titre'
            ]);

            if ($validator->fails()) {

                return $this->sendError('Erreur de validation', $validator->errors());

            }

            if (isset($datas['title']) && !empty($datas['title'])) {

                $datas['slug'] = Hash::make($datas['title']);

            }

            if (($datas['publish'] == "NON") && ($datas['aLaUne'] == "OUI")) {

                return $this->sendError('Ooops Desolé. Vous ne pouvez pas mettre un article à la Une sans le publier');

            }

            $article = Article::create([
                'title' => $datas['title'],
                'slug' =>  $datas['slug'],
                'subtitle' =>  $datas['subtitle'],
                'content' =>  $datas['content'],
                'category_id' =>  $datas['category_id'],
                'aLaUne' =>  $datas['aLaUne'],
                'publish' =>  $datas['publish'],
            ]);

        $uploadFiles = $request->filesArticle;

        if (!empty($uploadFiles)) {
            foreach ($uploadFiles as $image) {
                $imageName =   $image->store('articles');
               $medias =  Media::create([
                    'picture_name' => $imageName,
                    'article_id' => $article->id
                ]);
            }
        }

        

        return $this->sendResponse($uploadFiles, 'L\'article a été enregistré avec succès.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
