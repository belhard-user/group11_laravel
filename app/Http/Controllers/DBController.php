<?php

namespace App\Http\Controllers;

use App\People;
use App\Test;
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

        $tests = Test::peopleH('a');
        
        $avg = round($tests->avg('age'));

        $tests = $tests->get();

        return view('db.select', compact('tests', 'avg'));
    }

    public function create()
    {
        $test = Test::firstOrNew([
            'name' => 'Neo3',
            'email' => 'neo@gmail.com',
        ]);

        Debugbar::info($test);

        $test->save();
//        Test::find(1)->update(['age' => 23]);

        return view('db.insert');
    }

    public function relation()
    {
        $tank = Test::find(3);

        /*$test = Test::create([
            'name' => 'Tank',
            'age' => 23,
            'email' => 'a@a.com'
        ]);*/
        
        $tank->people()->create(['name' => 'ураа м...']);

        return view('db.insert');
    }

    public function manyToMany()
    {
        $role = \App\Role::first();

        // $role->people()->attach([1, 2, 3], ['additional' => 'asdasdas']);

        dd($role->people);
    }
}
