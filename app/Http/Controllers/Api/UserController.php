<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use App\Models\Role;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersCount = Utilisateur::count();

        $usersCountHH = DB::table("administrateurs") ->select(array("administrateurs.id", "administrateurs.created_at" ,"administrateurs.nomComplet","roles.name", "roles.id", "users.email", "users.telephone","users.status"))
            ->where("roles.id", "=", 2)
            ->leftJoin("roles", "roles.id", "=", "administrateurs.role_id")
            ->leftJoin("users", "users.id", "=", "administrateurs.user_id")
            ->orderBy('administrateurs.id', 'desc')
            ->count();

        if ($usersCount == 0) {

            return $this->sendResponse(['usersCount'=>$usersCount, 'usersCountHH'=>$usersCountHH], 'Aucun utilisateur n\'est enregistré.');

        } else {

            $newsLatters = DB::table("utilisateurs") ->select(array("utilisateurs.id", "utilisateurs.created_at" ,"utilisateurs.nomComplet","roles.name", "users.email", "users.telephone","users.status"))
            ->leftJoin("roles", "roles.id", "=", "utilisateurs.role_id")
            ->leftJoin("users", "users.id", "=", "utilisateurs.user_id")
            ->orderBy('utilisateurs.id', 'desc')
            ->paginate(10);

            $newsLattersHH = DB::table("administrateurs") ->select(array("administrateurs.id", "administrateurs.created_at" ,"administrateurs.nomComplet","roles.name", "roles.id", "users.email", "users.telephone","users.status"))
            ->where("roles.id", "=", 2)
            ->leftJoin("roles", "roles.id", "=", "administrateurs.role_id")
            ->leftJoin("users", "users.id", "=", "administrateurs.user_id")
            ->orderBy('administrateurs.id', 'desc')
            ->paginate(10);

            return $this->sendResponse(['newsLatters'=>$newsLatters, 'newsLattersHH'=>$newsLattersHH,'usersCount'=>$usersCount, 'usersCountHH'=>$usersCountHH], 'Liste de tous les utilisateurs.');
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
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['string', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'nomComplet' => ['required', 'string', 'max:255'],
        ],[
            'required' => 'L\' :attribute est obligatoire.',
            'password.required' => 'Votre :attribute est obligatoire.',
            'nomComplet.required' => 'Vos :attribute est obligatoire.'
        ], [
            'email' => 'email',
            'password' => 'mot de passe',
            'nomComplet' => 'nom et prénoms'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['password']) && empty($datas['password'])) {

            $datas['password'] = Hash::make($datas['password']);

        }else {

            $datas['password'] = Hash::make('password');

        }

        $role = Role::where("name", "PUBLICATEUR ARTICLE")->first();

        $user =  User::create([
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'role_id' => $role->id,
            'password' =>  $datas['password']
        ]);

        $utlisateur = Administrateur::create([
            'nomComplet' => $datas['nomComplet'],
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);

        return $this->sendResponse($utlisateur, 'Votre Compte a ete cree avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statisques()
    {
        $usersCount = Utilisateur::count();

        $usersCountHH = DB::table("administrateurs") ->select(array("administrateurs.id", "administrateurs.created_at" ,"administrateurs.nomComplet","roles.name", "roles.id", "users.email", "users.telephone","users.status"))
            ->where("roles.id", "=", 2)
            ->leftJoin("roles", "roles.id", "=", "administrateurs.role_id")
            ->leftJoin("users", "users.id", "=", "administrateurs.user_id")
            ->orderBy('administrateurs.id', 'desc')
            ->count();

        if ($usersCount == 0) {

            return $this->sendResponse(['usersCount' => $usersCount ], 'Aucun utilisateur n\'est enregistré.');

        } else {

            $newsLatters = Utilisateur::get();
            

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
                'usersCount' =>  $usersCount,
                'usersCountHH' =>  $usersCountHH,
            ], 'Bilan sur tous les utilisateurs');
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
        $newsLatterHH = Utilisateur::findOrFail($id);

        $newsLatter = User::findOrFail($newsLatterHH->user_id);

        if ($newsLatter->status == 1) {

            $newsLatter->status = 0;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet utilisateur a été bloqué avec succès.");

        } else {

            $newsLatter->status = 1;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet utilisateur a été débloqué avec succès.");
        }
        

       
    }

    public function changeStatusHH($id)
    {
        $newsLatterHH = Administrateur::findOrFail($id);

        $newsLatter = User::findOrFail($newsLatterHH->user_id);

        if ($newsLatter->status == 1) {

            $newsLatter->status = 0;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet utilisateur a été bloqué avec succès.");

        } else {

            $newsLatter->status = 1;

            $newsLatter->update();

            return $this->sendResponse($newsLatter, "Cet utilisateur a été débloqué avec succès.");
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

            $newsLatterShow = Utilisateur::findOrFail($id);

            return $this->sendResponse($newsLatterShow, 'Votre utilisateur a été selectionnée.');

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucun utilisateur trouvé.');

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
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['string', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'nomComplet' => ['required', 'string', 'max:255'],
        ],[
            'required' => 'L\' :attribute est obligatoire.',
            'password.required' => 'Votre :attribute est obligatoire.',
            'nomComplet.required' => 'Vos :attribute est obligatoire.'
        ], [
            'email' => 'email',
            'password' => 'mot de passe',
            'nomComplet' => 'nom et prénoms'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['password']) && empty($datas['password'])) {

            $datas['password'] = Hash::make($datas['password']);

        }else {

            $datas['password'] = Hash::make('password');

        }

        $role = Role::where("name", "PUBLICATEUR ARTICLE")->first();

        $user =  User::create([
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'role_id' => $role->id,
            'password' =>  $datas['password']
        ]);

        $utlisateur = Administrateur::create([
            'nomComplet' => $datas['nomComplet'],
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);

        return $this->sendResponse($utlisateur, 'Votre Compte a ete modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsLatterHH = Utilisateur::findOrFail($id);

        $newsLatter = User::findOrFail($newsLatterHH->user_id);

        $newsLatter->delete();

        $newsLatterHH->delete();

        return $this->sendResponse($newsLatter, "Cet utilisateur a ete supprimé avec succès.");
    }

    public function destroyHH($id)
    {
        $newsLatterHH = Administrateur::findOrFail($id);

        $newsLatter = User::findOrFail($newsLatterHH->user_id);

        $newsLatter->delete();

        $newsLatterHH->delete();

        return $this->sendResponse($newsLatter, "Cet utilisateur a ete supprimé avec succès.");
    }
}
