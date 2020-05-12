<?php

namespace App\Http\Controllers\Bible;

use App\BibleBooksTexts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BibleBooksTextsController extends Controller
{

    private $booksText;

    public function __construct(BibleBooksTexts $bibleBooksTexts) {

        $this->cors();
        
        $this->booksTexts = $bibleBooksTexts;
    }

    //public function index(){
//
    //    return response()->json($this->booksTexts::paginate(10));
  //  }
    
    public function index(){
        return response()->json($this->booksTexts->all());
    }
    
    public function show($id) {

        $bookTexts = $this->booksTexts->find($id);

        if(!$bookTexts) return response()->json(['data' => ['msg'=> 'Texto não encontrado!']], 404);

        $data = ['data' => $bookTexts];

        return response()->json($data);
    }

    public function store(Request $request) {

        try {

            $data = $request->all();

            $this->books->create($data);

            $msg_return = ['data' => ['Texto criado com sucesso!']];

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

            $bookTexts = $this->booksTexts->find($id);

            $bookTexts->update($data);

            $msg_return = ['data' => ['Texto atualizado com sucesso!']];

            return response()->json($msg_return, 201);
        } catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json($th->getMessage(), 424);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }

    public function delete(BibleBooksTexts $id) {

        try {

            $id->delete();

            $msg_return = ['data' => ['Livro deletado com sucesso!']];

            return response()->json($msg_return, 200);

        }  catch (\Throwable $th) {

            if(config('app.debug')) {

                return response()->json(ApiError::errorMessage($e->getMessage(), 424));
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a ação!', 424));
        }
    }
}
