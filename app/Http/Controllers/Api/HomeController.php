<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aLaUne()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendRespone($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::get();
                
            $articleCount = Article::count();

            if ($articleCount == 0) {

                return $this->sendRespone($articleCount, 'Aucun article n\'est enregistré.');
    
            } else {

                $articleAlaUneSlider = null;

                $articleAlaUneCard = null;

                $articleAlaUneCarousel = null;

                $articleAlaUneCount = null;

                //Article A la Une

                $articleAlaUneCount =  DB::table("articles")->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.created_at" , "categories.id" , "categories.categoryName as category"))
                ->where('articles.publish', '=', "OUI PUBLIE")
                ->where('articles.aLaune', '=', "OUI")
                ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                ->count();

                if ($articleAlaUneCount == 0) {

                    return $this->sendRespone(['articleAlaUneCount' => $articleAlaUneCount,  'categories' => $categories],'Aucun article à la une  n\'est enregistré.');

                } else {

                    $articleAlaUneCarousel =  DB::table("articles")->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.created_at" , "categories.id" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "OUI PUBLIE")
                    ->where('articles.aLaune', '=', "OUI")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->take(10)->get();
    
                    $articleAlaUneCard =  DB::table("articles")->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.created_at" , "categories.id" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "OUI PUBLIE")
                    ->where('articles.aLaune', '=', "OUI")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->take(4)->get();
    
                    $articleAlaUneSlider =  DB::table("articles")->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.created_at" , "categories.id" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "OUI PUBLIE")
                    ->where('articles.aLaune', '=', "OUI")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->take(30)->get();

                    return $this->sendRespone(['articleAlaUneCount' => $articleAlaUneCount, 'articleAlaUneSlider' => $articleAlaUneSlider,'articleAlaUneCard' => $articleAlaUneCard, 'articleAlaUneCarousel' => $articleAlaUneCarousel ,'categories' => $categories], 'liste des articles a la une');
    
                }
            }
        }
    }

    public function home()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendRespone($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::get();

            $articleCount = Article::count();

            if ($articleCount == 0) {

                return $this->sendRespone(['categories'=> $categories, 'articleCount'=> $articleCount], 'Aucun article n\'est enregistré.');
    
            } else { 

                return $this->sendResponse(['categories'=> $categories, 'articleCount'=> $articleCount], 'Liste de toutes les categories et articles.');

            }
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
        //
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
