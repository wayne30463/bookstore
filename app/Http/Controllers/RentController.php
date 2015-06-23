<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use URL;

class RentController extends Controller {


    /**
     * 顯示所給定的使用者個人資料。
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        //GET /photo
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
    public function update(Request $request,$id)
    {
        //PUT/PATCH /photo/{photo}
    }
    public function destroy($id)
    {
        //DELETE /photo/{photo}
    }

}