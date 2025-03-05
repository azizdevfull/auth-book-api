<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    public function index()
    {        
        $perPage=request()->per_page ?? 10;
        $books=Book::paginate( $perPage);
        return response()->json([
            'data'=>BookResource::collection($books),
            'meta'=>[
                'total'=>$books->total(),
                'current_page'=>$books->currentPage(),
                 'per_page'=>$books->perPage(),
                'last_page'=>$books->lastPage(),
            ],
            'links' => [
                'first' => $books->url(1),
                'last' => $books->url($books->lastPage()),
                'prev' => $books->previousPageUrl(),
                'next' => $books->nextPageUrl(),
            ]
        ]);
    }
    public function store(BookStoreRequest $request)
    {   
        $user=auth()->user();
        $book=$user->create([
            'title'=>$request->title,
            'content'=>$request->content,
            'author_id'=>$request->author_id
        ]);
            return response()->json($book,201); 
    }
    public function show(string $id)
    {
        $post=Book::findOrFail($id);
        return response()->json($post);
    }
    public function update(BookUpdateRequest $request, string $id)
    {
        $book=Book::findOrFail($id);
        $book->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'author_id'=>$request->author_id
        ]);
        return response()->json($book);
        
    }
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json([
            'message'=>'Sizning Kitobingiz muaffaqqiyatli o`chirildi'
        ]);
    }
}
