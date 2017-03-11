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

    public function delete()
    {
        $r = DB::table('test')
            ->whereBetween('age', [23, 34])
            ->delete();

        Debugbar::info($r);
        return view('db.insert');
    }

    public function update()
    {
        $r = DB::table('test')
            ->where('id', 1)
            ->decrement('age', 50, ['name' => 'rename again']);
            // ->update(['age' => 0, 'name' => 'rename']);

        Debugbar::info($r);
        return view('db.insert');
    }

    public function select(Request $request)
    {
        $tests = DB::table('test');

        if($request->has('age')){
            $tests = $tests->where('age', '>', $request->get('age'));
        }

        $avg = round($tests->avg('age'));
        $tests = $tests
            ->join('articles', 'test.id', '=', 'articles.id')
            ->select('articles.*', 'articles.id as aid', 'test.*', 'test.id as tid');
        $tests = $tests->orderBy('age')->get();

        Debugbar::info($tests);

        return view('db.select', compact('tests', 'avg'));
    }
}
