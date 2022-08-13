<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Role;
use App\Models\Utilisateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
   /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)) {
            $login_type = 'username';
        } else {
            $login_type = 'phone';
        }
        if ($login_type === 'username') {
            $datas = $request->all();
            $validator = Validator::make($datas, [
                'username' => 'required|email',
                'password' => 'required|string|min:5',
            ], [
                'required' => 'Le :attribute ou l\'email est obligatoire.',
                'password.required' => 'Le :attribute est obligatoire.'
            ], [
                'username' => 'L\'email',
                'password' => 'mot de passe'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Erreur de validation', $validator->errors());
            }

            $user = User::where('email', $datas['username'])->first();

            if ($user == null) {
                return $this->sendError('Aucun utilisateur trouvé avec cet email.');
            }

            if ($user->status === 0) {
                return $this->sendError('Veuillez activer votre compte.', $user);
            }

            if ($user->status === 2) {
                return $this->sendError('Ooops Désolé,votre compte est suspendu.', $user);
            }

            $credentials = array_merge(['email' => $request->input('username')], $request->only('password'));

            if (!$token = Auth::guard('api')->attempt($credentials)) {

                return $this->sendError('Les identifiants fournis sont invalides(pas autoris(é)e).', $user);

            }
        }
        //Phone / Password Login
        if ($login_type === 'phone') {
            $datas = $request->all();
            $validator = Validator::make($datas , [
                //'telephone' => 'required|regex:/(228)[0-9]{8}/',
                'username' => 'required|regex:/(00228)[0-9]{8}/',
                'password' => 'required|string|min:5',
            ], [
                'required' => 'Le :attribute ou l\'email est obligatoire.',
                'password.required' => 'Le :attribute est obligatoire.'
            ], [
                'username' => 'numéro de téléphone',
                'password' => 'mot de passe'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Erreur de validation', $validator->errors());
            }

            $user = User::where('telephone', $datas['username'])->first();

            if (is_null($user)) {
                return $this->sendError('Aucun utilisateur trouvé avec ce numéro.', $user);
            }

            if ($user->status === 0) {
                return $this->sendError('Veuillez activer votre compte.', $user);
            }

            if ($user->status === 2) {
                return $this->sendError('Ooops Désolé,votre compte est suspendu.', $user);
            }

            $credentials = array_merge(['telephone' => $request->input('username')], $request->only('password'));

            if (!$token = Auth::guard('api')->attempt($credentials)) {

                return $this->sendError('Les identifiants fournis sont invalides(pas autoris(é)e).', $user);

            }
        }
        if ($user->status === 1) {

           if ($user->role_id == 1) {
            
            return $this->sendResponse($this->createNewToken($token), 'ESPACE SUPER ADMINISTRATION');

           } elseif($user->role_id == 2) {

            return $this->sendResponse($this->createNewToken($token), 'ESPACE PUBLICATEUR ARTICLE');

           }else{

            return $this->sendResponse($this->createNewToken($token), 'ESPACE UTILISATEUR');

           }
           
        }
    }

    public function register(Request $request)
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

        $role = Role::where("name", "UTILISATEUR")->first();

        $user =  User::create([
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'role_id' => $role->id,
            'password' =>  $datas['password']
        ]);

        $utlisateur = Utilisateur::create([
            'nomComplet' => $datas['nomComplet'],
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);

        return $this->sendResponse($utlisateur, 'Votre Compte a ete cree avec succes.');

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Deconnexion réussie']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile() {

        if (auth()->user()->role_id == 1) {

            return response()->json([
                'User' => auth()->user(), 
                'Profil' => Administrateur::where('user_id', auth()->user()->id)->first(),
                'Role' => Role::where('id', auth()->user()->role_id)->first(),
                'Espace' => 'ESPACE SUPER ADMINISTRATION',
            ], 200);

        } elseif(auth()->user()->role_id == 2) {

            return response()->json([
                'User' => auth()->user(), 
                'Profil' => Administrateur::where('user_id', auth()->user()->id)->first(),
                'Role' => Role::where('id', auth()->user()->role_id)->first(),
                'Espace' => 'ESPACE PUBLICATEUR ARTICLE',
            ], 200);

        }else{

            return response()->json([
                'User' => auth()->user(), 
                'Profil' => Utilisateur::where('user_id', auth()->user()->id)->first(),
                'Role' => Role::where('id', auth()->user()->role_id)->first(),
                'Espace' => 'ESPACE UTILISATEUR',
            ], 200);

        }


        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}