<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $messagesCount = Message::count();

        if ($messagesCount == 0) {

            return $this->sendResponse(['messagesCount' => $messagesCount ], 'Aucun message n\'est enregistrée.');

        } else {

            $messages= Message::paginate(10);

            return $this->sendResponse(['messages'=> $messages, 'messagesCount' => $messagesCount ], 'Liste de tous les messages.');
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
            'telephone' => ['required','integer', ],
            'siteweb' => [],
            'nomComplet' => ['required', 'string', 'max:255'],
            'sujet' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
        ],[
            'required' => 'Votre :attribute est obligatoire.',
            'password.required' => 'Votre :attribute est obligatoire.',
            'nomComplet.required' => 'Vos :attribute est obligatoire.'
        ], [
            'email' => 'email',
            'telephone' => 'Télephone',
            'nomComplet' => 'nom et prénoms',
            'siteweb' => 'Site Web',
            'sujet' => 'Sujet',
            'content' => 'Contenu',
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }


        $message = Message::create($datas);


        return $this->sendResponse($message, 'Message envoyé avec succès');

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
