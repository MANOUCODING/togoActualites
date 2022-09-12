<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use App\Models\Category;
use App\Models\NewsLatter;
use App\Models\Utilisateur;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCountHH = Category::count();

        $articleCountHH = Article::count();

        $visitesCountHH = Visite::count();

        $usersCountHH = Utilisateur::count();

        $categoryCount = Category::count();

        $newsLatterCount = NewsLatter::count();

        $articleNotPublishCount = Article::where('publish', '=', "NON PUBLIE")->count();

        $articleAuthor =  DB::table("articles") ->select(array("articles.author", DB::raw('COUNT(category.id) as categoryCount') ,DB::raw('COUNT(articles.id) as articlesCount')))
        ->where('articles.author', '!=', "NON")
        ->leftJoin("categories", "categories.id", "=", "articles.category_id")
        ->groupBy("articles.author")
        ->count();

        if ($categoryCount == 0) {

            return $this->sendResponse(['categoryCountHH' => $categoryCountHH, 'articleAuthor' => $articleAuthor ,'articleNotPublishCount' => $articleNotPublishCount,'newsLatterCount' => $newsLatterCount,'articleCountHH' => $articleCountHH ,'visitesCountHH' => $visitesCountHH, 'usersCountHH' => $usersCountHH, 'infosArticlesCount' => 0], 'Aucune categorie n\'est enregistrée.');

        } else {

            $articleCount = Article::count();

            if ($articleCount == 0) {
    
                return $this->sendResponse(['categoryCountHH' => $categoryCountHH, 'articleAuthor' => $articleAuthor ,'articleNotPublishCount' => $articleNotPublishCount,'newsLatterCount' => $newsLatterCount,'articleCountHH' => $articleCountHH ,'visitesCountHH' => $visitesCountHH, 'usersCountHH' => $usersCountHH, 'infosArticlesCount' => 0], 'Aucun article n\'est enregistré.');
    
            }else{
                $articlePublishCount = Article::where('publish', '=', "OUI PUBLIE")->count();

                if ($articlePublishCount == 0) {
        
                    return $this->sendResponse(['categoryCountHH' => $categoryCountHH, 'articleAuthor' => $articleAuthor ,'articleNotPublishCount' => $articleNotPublishCount,'newsLatterCount' => $newsLatterCount,'articleCountHH' => $articleCountHH ,'visitesCountHH' => $visitesCountHH, 'usersCountHH' => $usersCountHH, 'infosArticlesCount' => $articlePublishCount], 'Aucun article publié n\'est enregistré.');
        
                }else{

                    $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.date_publish" , "categories.id" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "OUI PUBLIE")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->paginate(10);

                    return $this->sendResponse(['categoryCountHH' => $categoryCountHH, 'articleAuthor' => $articleAuthor ,'articleNotPublishCount' => $articleNotPublishCount,'newsLatterCount' => $newsLatterCount,'articleCountHH' => $articleCountHH ,'visitesCountHH' => $visitesCountHH, 'usersCountHH' => $usersCountHH, 'infosArticlesCount' => $articlePublishCount, 'infosArticles' => $articlePublish], 'Liste des articles publiés');
                }
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
