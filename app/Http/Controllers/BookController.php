<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use URL;
use App\Book;
use App\Customer;
use App\RentBook;

class BookController extends Controller {

    //datediff(`due`, now())
    /**
     * 顯示所給定的使用者個人資料。
     *
     * @param  int  $id
     * @return Response
     */
    public function index(Request $request)
    {
        //GET /photo
        $books = Book::whereRaw('isout = 0 AND kind = 1')
                    ->groupBy('isbn')
                    ->get(['*', DB::raw('count(isbn) as count')]);
        return view("book", ['tag' => 'book', 'books' => $books, 'searchKey' => 'isbn', 'searchValue' => '']);
    }
    public function create()
    {
        //GET /photo/create
    }
    public function store(Request $request)
    {
        //POST /photo
    }
    public function edit($id)
    {
        //GET /photo/{photo}/edit
    }
    public function show($id)
    {
        //GET /photo/{photo}
    }
    public function update(Request $request,$isbn)
    {
        //PUT/PATCH /photo/{photo}
        if($isbn == 0) {
            $searchKey = $request->input('_searchKey');
            $searchValue = $request->input('searchValue');
            if($searchValue == "")
                return redirect(URL::to('book'));
            $books = Book::whereRaw('isout = 0 AND kind = 1 AND '.$searchKey.' = '.$searchValue)
                        ->groupBy('isbn')
                        ->get(['*', DB::raw('count(isbn) as count')]);
            return view("book", ['tag' => 'book', 'books' => $books, 'searchKey' => $searchKey, 'searchValue' => $searchValue]);   
        }
        else {
            $cid = $request->input('cid');
            $customer = Customer::whereRaw('id = ?', [$cid])->first();
            if($customer == NULL)
                return "查無此顧客！";
            $book = Book::whereRaw('isout = 0 AND kind = 1 AND isbn = ?', [$isbn])->first();
            $book->isout = 1;
            $book->cid = $customer->id;
            $rentbook = new RentBook;
            $rentbook->bid = $book->id;
            $rentbook->cid = $book->cid;
            date_default_timezone_set('Asia/Taipei');
            $rentbook->due = date("Y-m-d H:i:s");
            $book->save();
            $rentbook->save();
            return "借閱成功！";
        }
    }
    public function destroy($id)
    {
        //DELETE /photo/{photo}
    }

}