<?php

namespace App\Http\Controllers;

use DB;
use Debugbar;
use Illuminate\Http\Request;

class DBController extends Controller
{
    public function insert()
    {
        $db = DB::table('test');

        $names = [
            ['name' => 'Morpheus', 'age' => 34, 'email' => 'morpheus@gmail.com'],
            ['name' => 'Tank', 'age' => 54, 'email' => 'tank@gmail.com'],
            ['name' => 'Trinity', 'age' => 74, 'email' => 'trinity@gmail.com'],
            ['name' => 'Dozer', 'age' => 28, 'email' => 'dozer@gmail.com'],
        ];

        $db->insert($names);

        Debugbar::info($db);

        return view('db.insert');
    }
}
