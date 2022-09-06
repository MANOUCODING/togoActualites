<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use App\Models\Message;
use App\Models\Visite;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisiteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $visitesCount = Visite::count();

        if ($visitesCount == 0) {

            return $this->sendResponse(['visitesCount' => $visitesCount ], 'Aucune visite n\'est enregistrée.');

        } else {

            $visites = Visite::get();

            $articles = Article::get();

            $countVisitesM = 0;
            $countVisitesW = 0;
            $countVisitesJ = 0;
            $countVisitesH = 0;

            $countArticlesM = 0;
            $countArticlesW = 0;
            $countArticlesJ = 0;
            $countArticlesH = 0;

            foreach ($visites as  $visite) {

                # code...

                $visite_dateM =  date('m-y'  ,strtotime($visite->created_at));

                $visite_dateW =  date('d-m-Y'  ,strtotime($visite->created_at));

                $visite_dateJ =  date('H:i:s'  ,strtotime($visite->created_at));


                if( $visite_dateM == date('m-y')){

                    $countVisitesM++;


                    //Nombre d'utlisateur depuis les 7 derniers Jours

                    $year = substr(date('Y-m-d'), 0, -6);
                    $month = substr(date('Y-m-d'), -5, -3);
                    $day = substr(date('Y-m-d'), -2);

                    // récupère la date du jour
                    $date_string = mktime(0,0,0,$month,$day,$year);

                    // Supprime les jours
                    $timestamp = $date_string - (7 * 86400);

                    $nouvelle_date = date("d-m-Y", $timestamp);

                    if ($nouvelle_date <=  $visite_dateW) {

                        $countVisitesW++;

                    }

                    //Nombre d'utilisateur  depuis 24H
                    if ($visite_dateW == date("d-m-Y")) {
                        $h1 = 86400;
                        $h2 = strtotime(date("H:i:s"));
                        $Start = gmdate("H:i:s", $h2-$h1);
                        if ($Start <=  $visite_dateJ) {

                            $countVisitesJ++;

                            $h1 = 3600;
                            $h2 = strtotime(date("H:i:s"));
                            $StartH = gmdate("H:i:s", $h2-$h1);

                            if ($StartH <=  $visite_dateJ) {

                                $countVisitesH++;


                            }

                        }

                    }



                }

            }

            $articlesCount = Article::count();

            if ($articlesCount == 0) {

                $countArticlesM = 0;
                $countArticlesW = 0;
                $countArticlesJ = 0;
                $countArticlesH = 0;

            } else {

                foreach ($articles as  $article) {

                    # code...

                    $article_dateM =  date('m-y'  ,strtotime($article->created_at));

                    $article_dateW =  date('d-m-Y'  ,strtotime($article->created_at));

                    $article_dateJ =  date('H:i:s'  ,strtotime($article->created_at));


                    if( $article_dateM == date('m-y')){


                        $countArticlesM++;

                        //Nombre d'utlisateur depuis les 7 derniers Jours

                        $year = substr(date('Y-m-d'), 0, -6);
                        $month = substr(date('Y-m-d'), -5, -3);
                        $day = substr(date('Y-m-d'), -2);

                        // récupère la date du jour
                        $date_string = mktime(0,0,0,$month,$day,$year);

                        // Supprime les jours
                        $timestamp = $date_string - (7 * 86400);

                        $nouvelle_date = date("d-m-Y", $timestamp);

                        if ($nouvelle_date <=  $article_dateW) {

                            $countArticlesW++;

                        }

                        //Nombre d'utilisateur  depuis 24H
                        if ($article_dateW == date("d-m-Y")) {
                            $h1 = 86400;
                            $h2 = strtotime(date("H:i:s"));
                            $Start = gmdate("H:i:s", $h2-$h1);
                            if ($Start <=  $article_dateJ) {

                                $countArticlesJ++;

                                $h1 = 3600;
                                $h2 = strtotime(date("H:i:s"));
                                $StartH = gmdate("H:i:s", $h2-$h1);

                                if ($StartH <=  $article_dateJ) {


                                    $countArticlesH++;

                                }

                            }

                        }



                    }

                }
            }

            return $this->sendResponse([
                'countArticlesH' =>  $countArticlesH,
                'countArticlesJ' =>  $countArticlesJ,
                'countArticlesW' =>  $countArticlesW,
                'countArticlesM' =>  $countArticlesM,
                'countVisitesH' =>  $countVisitesH,
                'countVisitesJ' =>  $countVisitesJ,
                'countVisitesW' =>  $countVisitesW,
                'countVisitesM' =>  $countVisitesM,
                'visitesCount' =>  $visitesCount,
            ], 'Bilan sur toutes les visites');
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

        $visite = Visite::orderby('id', 'desc')->take(1)->first();

        if ($visite == null) {

            $createVisite = Visite::create([
                'visitesCompteur' =>  1,
                'visitesTotal' => 1,
            ]);

        }else {

            $createVisite = Visite::create([
                'visitesCompteur' => $visite->visitesCompteur + 1,
                'visitesTotal' => $visite->visitesTotal + 1,
            ]);

        }

        return $this->sendResponse($createVisite, 'Visite generer avec succes');

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

            $messageShow = Message::findOrFail($id);

            return $this->sendResponse($messageShow, 'Votre message a été selectionné.');

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucun message trouvé');

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
        $message = Message::findOrFail($id);

        $message->delete();

        return $this->sendResponse($message, "Le message a été supprimé avec succès.");
    }
}
