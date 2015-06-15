<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RentController extends Controller {

    /**
     * 顯示所給定的使用者個人資料。
     *
     * @param  int  $id
     * @return Response
     */
    public function showRent()
    {
        //return view('user.profile', ['user' => User::findOrFail($id)]);
        return view("rent");
    }

}