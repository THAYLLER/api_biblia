<?php

namespace App\Http\Controllers\Bible;

use App\Devotionais;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevotionaisController extends Controller
{
    private $devotionais;

    public function __construct(Devotionais $devotionais) {

        $this->cors();
        $this->devotionais = $devotionais;
    }

    //public function index(){

      //  return response()->json($this->devotionais::paginate(10));
    //}
    
    public function index(){
        return response()->json($this->devotionais->all());
    }

    public function show($id) {

        $devotionais = $this->devotionais->find($id);

        if(!$devotionais ) return response()->json(['data' => ['msg'=> 'Devocional não encontrado!']], 404);

        $data = ['data' => $book];

        return response()->json($data);
    }

    public function store(Request $request) {

        try {

            $data = $request->all();

            $this->devotionais->create($data);

            $msg_return = ['data' => ['Devocional criado com sucesso!']];

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

            $devotionais = $this->devotionais->find($id);

            $book->update($data);

            $msg_return = ['data' => ['Devocional atualizado com sucesso!']];

            return response()->json($msg_return, 201);
        } catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json($th->getMessage(), 424);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }

    public function delete(BibleBooks $id) {

        try {

            $id->delete();

            $msg_return = ['data' => ['Devocional deletado com sucesso!']];

            return response()->json($msg_return, 200);

        }  catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json(ApiError::errorMessage($e->getMessage(), 424));
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }
}
