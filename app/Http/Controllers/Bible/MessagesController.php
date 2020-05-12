<?php

namespace App\Http\Controllers\Bible;

use App\Messages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    private $messages;

    public function __construct(Messages $messages) {

        $this->cors();

        $this->messages = $messages;
    }

    //public function index(){
    //  return response()->json($this->messages::paginate(10));
    //}
    
    public function index(){
        return response()->json($this->messages->all());
    }

    public function show($id) {

        $book = $this->messages->find($id);

        if(!$book) return response()->json(['data' => ['msg'=> 'Mensagem não encontrado!']], 404);

        $data = ['data' => $book];

        return response()->json($data);
    }

    public function store(Request $request) {

        try {

            $data = $request->all();

            $this->messages->create($data);

            $msg_return = ['data' => ['Mensagem criada com sucesso!']];

            return response()->json($msg_return, 201);
        } catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json($th->getMessage(), 424);
            }

            return response()->json('Houve um erro ao realizar a ação!', 424);
        }
    }

    public function update($id,Request $request) {

        try {

            $data = $request->all();

            $book = $this->messages->find($id);

            $book->update($data);

            $msg_return = ['data' => ['Menssagem atualizada com sucesso!']];

            return response()->json($msg_return, 201);
        } catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json($th->getMessage(), 424);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }

    public function delete(Messages $id) {

        try {

            $id->delete();

            $msg_return = ['data' => ['Menssagem deletada com sucesso!']];

            return response()->json($msg_return, 200);

        }  catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json(ApiError::errorMessage($e->getMessage(), 424));
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }
}
