<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //return view('user.profile', ['user' => User::findOrFail($id)]);
        return view("order", ['tag' => 'order']);
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
        return "store".$request->input('name');
    }
    public function edit($id)
    {
        //GET /photo/{photo}/edit
        return view("orderEditor", ['id' => $id, 'tag' => 'order']);
    }
    public function update($id)
    {
        //PUT/PATCH /photo/{photo}
        //do update($id)
        //return redirect('order', ['tag' => 'order']);
        return "order_update".$id;
    }
    public function destroy($id)
    {
        //DELETE /photo/{photo}
        //do delete($id)
        //return redirect('order', ['tag' => 'order']);
        return "order_destroy".$id;
    }

}