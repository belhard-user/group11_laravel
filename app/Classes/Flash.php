<?php

namespace App\Classes;

class Flash
{
    private function set($title, $message, $type)
    {
        session()->flash('flash', [
            'title' => $title,
            'msg' => $message,
            "type" => $type
        ]);
    }

    public function __call($type, $args)
    {
        $title = array_get($args, '0');
        $message = array_get($args, '1');

        $this->set($title, $message, $type);
    }


    /*public function success($title, $message)
    {
        $this->set($title, $message, 'success');
    }
    
    public function info($title, $message)
    {
        $this->set($title, $message, 'info');
    }
    
    public function error($title, $message)
    {
        $this->set($title, $message, 'error');
    }*/
}