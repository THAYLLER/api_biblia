<?php

namespace App\Http\Controllers\Bible;

use App\BibleBooks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BibleBooksController extends Controller
{
    private $books;

    public function __construct(BibleBooks $bibleBooks) {

        $this->cors();
        $this->books = $bibleBooks;
    }

    //public function index(){
      //  return response()->json($this->books::paginate(10));
    //}
    
    public function index(){
        return response()->json($this->books->all());
    }

    public function show($id) {

        $book = $this->books->find($id);

        if(!$book) return response()->json(['data' => ['msg'=> 'Livro não encontrado!']], 404);

        $data = ['data' => $book];

        return response()->json($data);
    }

    public function store(Request $request) {

        try {

            $data = $request->all();

            $this->books->create($data);

            $msg_return = ['data' => ['Livro criado com sucesso!']];

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

            $book = $this->books->find($id);

            $book->update($data);

            $msg_return = ['data' => ['Livro atualizado com sucesso!']];

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
