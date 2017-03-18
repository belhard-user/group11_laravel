<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public function index()
    {
        /*$array = ['id' => 'wer', 'name' => 'ss', 'age' => '', 'price' => 2.3, 'date' => new \DateTime('-30 days')];


        $validator = \Validator::make($array, [
            'id' => 'required|integer',
            'name' => 'required|min:3',
            'age' => 'required|integer|between:18,65',
            'price' => 'required|numeric|min:3',
            'date' => 'after:-29 days'
        ]);
        dd($validator->fails(), $validator->errors()->all());*/
        
        return view('validate.index');
    }

    public function test(TestRequest $request)
    {
        /*$this->validate($request, [
            'name' => 'required|min:3',
            'age' => 'required|integer|between:18,65',
        ]);*/

        dd($request->all());
    }
}
