<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use URL;
use App\Order;
use App\OrderBook;
use App\Book;


class OrderController extends Controller {

    /**
     * 顯示所給定的使用者個人資料。
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        //GET /photo
        $orders = Order::all();
        return view("order", ['tag' => 'order', 'orders' => $orders]);
    }
    public function create()
    {
        //GET /photo/create
        //return redirect('order');
        return view("orderCreator", ['tag' => 'order']);
    }
    public function store(Request $request)
    {
        //POST /photo
        $order = new Order;
        $order_last = Order::orderBy('id','desc')->first();
        if($order_last == NULL)
            $order->id = 0;
        else
            $order->id = $order_last->id + 1;
        $order->date = $request->input('date');
        $order->publish = $request->input('publish');
        for ($i=0,$books=0,$cost=0; $i < count($request->input('kind')); $i++){ 
            if($request->input('among')[$i] > 0){
                $orderebook = new OrderBook;
                $orderebook->oid = $order->id;
                $orderebook->kind = $request->input('kind')[$i];
                $orderebook->isbn = $request->input('isbn')[$i];
                $orderebook->name = $request->input('name')[$i];
                $orderebook->autor = $request->input('autor')[$i];
                $orderebook->among = $request->input('among')[$i];
                $orderebook->price = $request->input('price')[$i];
                $books += $request->input('among')[$i];
                $cost += ($orderebook->among * $orderebook->price);
                $orderebook->save();
            }
        }
        $order->books = $books;
        $order->cost = $cost;
        $order->save();
        return redirect(URL::to('order'));
    }
    public function edit($id)
    {
        //GET /photo/{photo}/edit
        $order = Order::whereRaw("id = ?", [$id])->first();
        $orderbooks = OrderBook::whereRaw("oid = ?", [$id])->get();
        return view("orderEditor", ['tag' => 'order', 'order' => $order, 'orderbooks' => $orderbooks]);
    }
    public function show($id)
    {
        //GET /photo/{photo}
        $order = Order::whereRaw("id = ?", [$id])->first();
        $orderbooks = OrderBook::whereRaw("oid = ?", [$id])->get();
        return view("orderViewer", ['tag' => 'order', 'order' => $order, 'orderbooks' => $orderbooks]);
    }
    public function update(Request $request,$id)
    {
        //PUT/PATCH /photo/{photo}
        $order = Order::whereRaw("id = ?", [$id])->first();
        if($request->input('_method') == "PATCH"){
            OrderBook::whereRaw("oid = ?", [$id])->delete();
            $order->date = $request->input('date');
            $order->publish = $request->input('publish');
            for ($i=0,$books=0,$cost=0; $i < count($request->input('kind')); $i++){ 
                if($request->input('among')[$i] > 0 && $request->input('isbn')[$i] != ""){
                    $orderebook = new OrderBook;
                    $orderebook->oid = $order->id;
                    $orderebook->kind = $request->input('kind')[$i];
                    $orderebook->isbn = $request->input('isbn')[$i];
                    $orderebook->name = $request->input('name')[$i];
                    $orderebook->autor = $request->input('autor')[$i];
                    $orderebook->among = $request->input('among')[$i];
                    $orderebook->price = $request->input('price')[$i];
                    $books += $request->input('among')[$i];
                    $cost += ($orderebook->among * $orderebook->price);
                    $orderebook->save();
                }
            }
            $order->books = $books;
            $order->cost = $cost;
            $order->save();
        }
        else{
            $order->arrive = true;
             $orderbooks = OrderBook::whereRaw("oid = ?", [$id])->get();
             foreach ($orderbooks as $key => $value){
                for ($i=0;$i<$value->among;$i++){
                    $book = new Book;
                    $book->kind = $value->kind;
                    $book->isbn = $value->isbn;
                    $book->name = $value->name;
                    $book->autor = $value->autor;
                    $book->price = $value->price;
                    $book->save();
                }
             }
        }
        $order->save();
        return redirect(URL::to('order'));
    }
    public function destroy($id)
    {
        //DELETE /photo/{photo}
        //do delete($id)
        //return redirect('order', ['tag' => 'order']);
        Order::whereRaw("id = ?", [$id])->delete();
        OrderBook::whereRaw("oid = ?", [$id])->delete();
        $orders = Order::all();
        return redirect(URL::to('order'));
    }

}