<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::paginate(10);

            return $this->sendResponse($categories, 'Liste de toutes les categories.');
        }
        
    }

    public function publish()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse(['categoryCount' => $categoryCount, 'infosArticlesCount' => 0], 'Aucune categorie n\'est enregistrée.');

        } else {

            $articleCount = Article::count();

            if ($articleCount == 0) {
    
                return $this->sendResponse(['articleCount' => $articleCount, 'infosArticlesCount' => 0], 'Aucun article n\'est enregistré.');
    
            }else{
                $articlePublishCount = Article::where('publish', '=', "OUI PUBLIE")->count();

                if ($articlePublishCount == 0) {
        
                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount], 'Aucun article publié n\'est enregistré.');
        
                }else{

                    $articlePublish = DB::table("articles") ->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.date_publish" , "categories.id as id_category" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "OUI PUBLIE")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->paginate(10);

                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount, 'infosArticles' => $articlePublish], 'Liste des articles publiés');
                }
            }
        }
    }

    public function notPublish()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse(['categoryCount' => $categoryCount, 'infosArticlesCount' => 0], 'Aucune categorie n\'est enregistrée.');

        } else {

            $articleCount = Article::count();

            if ($articleCount == 0) {
    
                return $this->sendResponse(['articleCount' => $articleCount, 'infosArticlesCount' => 0], 'Aucun article n\'est enregistré.');
    
            }else{
                $articlePublishCount = Article::where('publish', '=', "NON PUBLIE")->count();

                if ($articlePublishCount == 0) {
        
                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount], 'Aucun article publié n\'est enregistré.');
        
                }else{

                    $articlePublish =  DB::table("articles") ->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish" , "articles.created_at" , "categories.id as id_category" , "categories.categoryName as category"))
                    ->where('articles.publish', '=', "NON PUBLIE")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->orderBy('articles.id', 'desc')
                    ->paginate(10);

                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount, 'infosArticles' => $articlePublish], 'Liste des articles publiés');
                }
            }
        }
    }

    public function byCategory()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = DB::table("categories") ->select(array("categories.id", "categories.categoryName","categories.status", "categories.slug" , DB::raw('COUNT(articles.id) as countArticles')))
            ->leftJoin("articles", "articles.category_id", "=", "categories.id")
            ->groupBy("categories.id", "categories.categoryName","categories.status", "categories.slug")
            ->orderBy('countArticles', 'desc')
            ->paginate(10);

            return $this->sendResponse(['categories'=>$categories, 'categoryCount'=>$categoryCount], 'Liste de toutes les categories.');
        }
    }

    public function byAuthor()
    {
        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse(['categoryCount' => $categoryCount, 'infosArticlesCount' => 0], 'Aucune categorie n\'est enregistrée.');

        } else {

            $articleCount = Article::count();

            if ($articleCount == 0) {
    
                return $this->sendResponse(['articleCount' => $articleCount, 'infosArticlesCount' => 0], 'Aucun article n\'est enregistré.');
    
            }else{
                $articlePublishCount = Article::where('publish', '=', "OUI PUBLIE")->count();

                if ($articlePublishCount == 0) {
        
                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount], 'Aucun article publié n\'est enregistré.');
        
                }else{

                    $articlePublishCount =  DB::table("articles") ->select(array("articles.author", DB::raw('COUNT(category.id) as categoryCount') ,DB::raw('COUNT(articles.id) as articlesCount')))
                    ->where('articles.author', '!=', "NON")
                    ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                    ->groupBy("articles.author")
                    ->count();

                    if ($articlePublishCount == 0) {
                        return $this->sendResponse(['infosArticlesCount' => $articlePublishCount], 'Aucun article publié n\'est enregistré avec un auteur.');
                    } else {
                        $articlePublish =  DB::table("articles") ->select(array("articles.author", DB::raw('COUNT(categories.id) as categoryCount') ,DB::raw('COUNT(articles.id) as articlesCount')))
                        ->where('articles.author', '!=', "NON")
                        ->leftJoin("categories", "categories.id", "=", "articles.category_id")
                        ->groupBy("articles.author")
                        ->orderBy('articles.author', 'desc')
                        ->paginate(10);
                    

                    return $this->sendResponse(['infosArticlesCount' => $articlePublishCount, 'infosArticles' => $articlePublish], 'Liste des articles publiés');
                    }
                    
                }
            }
        }
    }

    public function changeAlaUne($id)
    {
        $article = Article::findOrFail($id);

        if ($article->aLaUne === "NON") {
            $article->aLaUne = "OUI";
            $article->update();
           return $this->sendResponse($article, 'Cet article a bien été mis a la une.');
        } else {
            $article->aLaUne = "NON";
            $article->update();
            return $this->sendResponse($article, 'Cet article a bien été enlevé de à la une.');
        }
        
    }

    public function changePublish($id)
    {
        $article = Article::findOrFail($id);

        if ($article->publish === "NON PUBLIE") {
            $article->publish = "OUI PUBLIE";
            $article->update();
            return $this->sendResponse($article, 'Cet article a bien été publié.');
        } else {
            $article->publish = "NON PUBLIE";
            $article->update();
            return $this->sendResponse($article, 'La publication de cet article a été desactivé.');
        }
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
                'content' => ['required', 'string'],
                'category_id' => ['required', 'integer'],
                'aLaUne' => ['required', 'string'],
                'publish' => ['required', 'string'],
            ],[
                'required'=> 'Votre :attribute est obligatoire.',
                'required.integer'=> 'Votre :attribute doit etre selecttonnée.',
                'required.string'=> 'Votre :attribute doit etre une chaine de caractère.',
                'title.required' => 'Le :attribute est obligatoire.'
            ], [
                'title' => 'titre',
                'category_id' => 'catégorie',
                'subtitle' => 'Sous Titre',
                'content' => 'contenu'
            ]);

            if ($validator->fails()) {

                return $this->sendError('Erreur de validation', $validator->errors());

            }

            if (isset($datas['title']) && !empty($datas['title'])) {

                $datas['slug'] = Hash::make($datas['title']);

            }

            if ($datas['author'] == null) {

                $datas['author'] = "NON";

            }

            if ($datas['subtitle'] == null) {

                $datas['subtitle'] = "NON";

            }

            if (($datas['publish'] == "NON PUBLIE") && ($datas['aLaUne'] == "OUI")) {

                return $this->sendError('Ooops Desolé. Vous ne pouvez pas mettre un article à la Une sans le publier');

            }

            if ($datas['publish'] == "OUI PUBLIE") {

                $article = Article::create([
                    'title' => $datas['title'],
                    'slug' =>  $datas['slug'],
                    'subtitle' =>  $datas['subtitle'],
                    'author' =>  $datas['author'],
                    'content' =>  $datas['content'],
                    'category_id' =>  $datas['category_id'],
                    'aLaUne' =>  $datas['aLaUne'],
                    'publish' =>  $datas['publish'],
                    'date_publish' =>  now(),
                ]);

            }else{

                $article = Article::create([
                    'title' => $datas['title'],
                    'slug' =>  $datas['slug'],
                    'subtitle' =>  $datas['subtitle'],
                    'author' =>  $datas['author'],
                    'content' =>  $datas['content'],
                    'category_id' =>  $datas['category_id'],
                    'aLaUne' =>  $datas['aLaUne'],
                    'publish' =>  $datas['publish'],
                ]);
            }

        $uploadFiles = $request->filesArticle;

        if (!empty($uploadFiles)) {
            foreach ($uploadFiles as $image) {
                $imageName =   $image->store('articles', 'public');
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
    public function show($slug)
    {

        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::get();

            $articleShow = Article::where('title', '=', $slug)->get();

            return $this->sendResponse(['categories' => $categories, 'articleShow' => $articleShow[0]], 'Liste de toutes les categories.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHH($slug)
    {

        $categoryCount = Category::count();

        if ($categoryCount == 0) {

            return $this->sendResponse($categoryCount, 'Aucune categorie n\'est enregistrée.');

        } else {

            $categories = Category::get();

            $articleShow =  DB::table("articles") ->select(array("articles.id as id", "articles.title","articles.author", "articles.slug" , "articles.aLaUne" , "articles.publish", "articles.subtitle", "articles.content" , "articles.created_at" , "categories.id as category_id" , "categories.categoryName as category"))
            ->where('articles.title', '=', $slug)
            ->leftJoin("categories", "categories.id", "=", "articles.category_id")
            ->first();

            $medias = Media::where('article_id', '=', $articleShow->id )->get();
            
            return $this->sendResponse(['categories' => $categories, 'articleShow' => $articleShow, 'medias' => $medias], 'Liste de toutes les categories.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'title' => ['required', 'string' ,'max:255'],
            'content' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
            'aLaUne' => ['required', 'string'],
            'publish' => ['required', 'string'],
        ],[
            'required'=> 'Votre :attribute est obligatoire.',
            'required.integer'=> 'Votre :attribute doit etre selecttonnée.',
            'required.string'=> 'Votre :attribute doit etre une chaine de caractère.',
            'title.required' => 'Le :attribute est obligatoire.'
        ], [
            'title' => 'titre',
            'category_id' => 'catégorie',
            'subtitle' => 'Sous Titre',
            'content' => 'contenu'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['title']) && !empty($datas['title'])) {

            $datas['slug'] = Hash::make($datas['title']);

        }

        if ($datas['author'] == null) {

            $datas['author'] = "NON";

        }

        if ($datas['subtitle'] == null) {

            $datas['subtitle'] = "NON";

        }

        if (($datas['publish'] == "NON PUBLIE") && ($datas['aLaUne'] == "OUI")) {

            return $this->sendError('Ooops Desolé. Vous ne pouvez pas mettre un article à la Une sans le publier');

        }

        if ($datas['publish'] == "OUI PUBLIE") {

            $article =Article::where('title', '=', $slug)->first();

            $article->update([
                'title' => $datas['title'],
                'slug' =>  $datas['slug'],
                'subtitle' =>  $datas['subtitle'],
                'author' =>  $datas['author'],
                'content' =>  $datas['content'],
                'category_id' =>  $datas['category_id'],
                'aLaUne' =>  $datas['aLaUne'],
                'publish' =>  $datas['publish'],
                'date_publish' =>  now(),
            ]);

        

        }else{

            $article =Article::where('title', '=', $slug)->first();

            $article->update([
                'title' => $datas['title'],
                'slug' =>  $datas['slug'],
                'subtitle' =>  $datas['subtitle'],
                'author' =>  $datas['author'],
                'content' =>  $datas['content'],
                'category_id' =>  $datas['category_id'],
                'aLaUne' =>  $datas['aLaUne'],
                'publish' =>  $datas['publish'],
            ]);
        }

    $uploadFiles = $request->filesArticle;


    if (!empty($uploadFiles)) {
        foreach ($uploadFiles as $image) {
            $imageName =    $image->store('articles');
           $medias =  Media::create([
                'picture_name' => $imageName,
                'article_id' => $article->id
            ]);
        }
    }



    return $this->sendResponse($uploadFiles, 'L\'article a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyByAuthor($author)
    {
        $articles = Article::where('author', '=' ,$author);

        $articlesSHH = Article::where('author', '=' ,$author)->get();

        foreach ($articlesSHH as $article) {

            $medias = Media::where('article_id', '=', $article->id);

            $medias->delete();
        }

        $articles->delete();

        return $this->sendResponse($articles, "Les articles de cet auteur et ses fichiers ont été supprimés avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $medias = Media::where('article_id', '=', $article->id);

        $medias->delete();

        $article->delete();

        return $this->sendResponse($article, "L' article et ses fichiers ont été supprimés avec succès.");
    }
}
