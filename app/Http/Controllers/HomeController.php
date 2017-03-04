<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $names = [
            'Neo',
            'Morpheus',
            'Tank',
            'Trinity',
            'Dozer',
            'Smith'
        ];

        $title = '<h1>Title</h1>';
        
        return view('home.index', compact('names', 'title'));
    }

    public function greet($people='default', $name='admin')
    {
        $str = 'hello ' . ucfirst($people) . ' from ' . ucfirst($name);
        
        return view('home.greet', compact('str'));
    }
}
