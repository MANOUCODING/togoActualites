<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\NewsLatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsLatterController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsLattersCount = NewsLatter::count();

        if ($newsLattersCount == 0) {

            return $this->sendResponse(['newsLattersCount'=>$newsLattersCount], 'Aucun abonné a la NewsLatter n\'est enregistré.');

        } else {

            $newsLatters = DB::table("news_latters") 
            ->orderBy('news_latters.id', 'desc')
            ->paginate(10);

            return $this->sendResponse(['newsLatters'=>$newsLatters, 'newsLattersCount'=>$newsLattersCount], 'Liste de tous les abonné a la NewsLatter.');
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
            'email' => ['required', 'email', 'unique:news_latters' ,'max:255'],
            'status' => ['integer'],
        ],[
            'email.required' => 'Votre :attribute est obligatoire.'
        ], [
            'email' => 'email'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }
        

        $newsLatter = NewsLatter::create([
            'email' => $datas['email'],
            'status' =>  $datas['status'],
        ]);

        return $this->sendResponse($newsLatter, 'Votre email a bien été enregistré.Vous serez tenus informés de nos prochains articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statisques()
    {
        $newsLattersCount = NewsLatter::count();

        if ($newsLattersCount == 0) {

            return $this->sendResponse(['newsLattersCount' => $newsLattersCount ], 'Aucun abonné a la NewsLatter n\'est enregistré.');

        } else {

            $newsLatters = NewsLatter::get();
            

            $countNewsLattersM = 0;
            $countNewsLattersW = 0;
            $countNewsLattersJ = 0;
            $countNewsLattersH = 0;
           

            foreach ($newsLatters as  $newsLatter) {

                # code...

                $newsLatter_dateM =  date('m-y'  ,strtotime($newsLatter->created_at));

                $newsLatter_dateW =  date('d-m-Y'  ,strtotime($newsLatter->created_at));

                $newsLatter_dateJ =  date('H:i:s'  ,strtotime($newsLatter->created_at));


                if( $newsLatter_dateM == date('m-y')){

                    if( $newsLatter_dateW == date('d-m-Y')){

                        $countNewsLattersJ++;

                    }

                    $year = substr(date('Y-m-d'), 0, -6);
                    $month = substr(date('Y-m-d'), -5, -3);
                    $day = substr(date('Y-m-d'), -2);

                    // récupère la date du jour
                    $date_string = mktime(0,0,0,$month,$day,$year);

                    if ($day === 1) {
                        // Supprime les jours
                        $timestamp = $date_string - (1 * 86400);

                        $nouvelle_date = date("d-m-Y", $timestamp);

                        if ($nouvelle_date <=  $newsLatter_dateW) {

                            $countNewsLattersW++;

                        }
                    }elseif ($day === 2) {
                        // Supprime les jours
                        $timestamp = $date_string - (2 * 86400);

                        $nouvelle_date = date("d-m-Y", $timestamp);

                        if ($nouvelle_date <=  $newsLatter_dateW) {

                            $countNewsLattersW++;

                        }
                    }elseif ($day === 3) {
                       // Supprime les jours
                       $timestamp = $date_string - (3 * 86400);

                       $nouvelle_date = date("d-m-Y", $timestamp);

                       if ($nouvelle_date <=  $newsLatter_dateW) {

                           $countNewsLattersW++;

                       }
                    }elseif ($day === 4) {
                        // Supprime les jours
                        $timestamp = $date_string - (4 * 86400);

                        $nouvelle_date = date("d-m-Y", $timestamp);
 
                        if ($nouvelle_date <=  $newsLatter_dateW) {
 
                            $countNewsLattersW++;
 
                        }
                    }elseif ($day === 5) {
                        // Supprime les jours
                        $timestamp = $date_string - (5 * 86400);

                        $nouvelle_date = date("d-m-Y", $timestamp);

                        if ($nouvelle_date <=  $newsLatter_dateW) {

                            $countNewsLattersW++;

                        }
                    }elseif ($day === 6) {
                       // Supprime les jours
                       $timestamp = $date_string - (6 * 86400);

                       $nouvelle_date = date("d-m-Y", $timestamp);

                       if ($nouvelle_date <=  $newsLatter_dateW) {

                           $countNewsLattersW++;

                       }
                    }elseif($day >= 7){
                        // Supprime les jours
                       $timestamp = $date_string - (7 * 86400);

                       $nouvelle_date = date("d-m-Y", $timestamp);

                       if ($nouvelle_date <=  $newsLatter_dateW) {

                           $countNewsLattersW++;

                       }
                    }
                   

                    $countNewsLattersM++;



                }

            }

            return $this->sendResponse([
                'countNewsLattersJ' =>  $countNewsLattersJ,
                'countNewsLattersW' =>  $countNewsLattersW,
                'countNewsLattersM' =>  $countNewsLattersM,
                'newsLattersCount' =>  $newsLattersCount,
            ], 'Bilan sur tous les abonnés de la newsLatter');
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $newsLatter = NewsLatter::findOrFail($id);

        if ($newsLatter->status == 1) {

            $newsLatter->status = 0;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet abonné a été bloqué dans la newsLatter avec succès.");

        } else {

            $newsLatter->status = 1;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet abonné a été débloqué dans la newsLatter avec succès.");
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
        try {

            $newsLatterShow = NewsLatter::findOrFail($id);

            return $this->sendResponse($newsLatterShow, 'Votre abonné a été selectionnée.');

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucun abonné trouvé.');

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
            'email' => ['required', 'email', 'unique:news_latters' ,'max:255'],
            'status' => ['integer'],
        ],[
            'email.required' => 'Votre :attribute est obligatoire.'
        ], [
            'email' => 'email'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }
        

        $newsLatter = NewsLatter::findOrFail($id);

        $newsLatter->update($datas);

        return $this->sendResponse($newsLatter, 'Votre email a bien été modifié.Vous serez tenus informés de nos prochains articles.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsLatter = NewsLatter::findOrFail($id);

        $newsLatter->delete();

        return $this->sendResponse($newsLatter, "Cet abonné a été supprimé de la newsLatter avec succès.");
    }
}
