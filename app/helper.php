<?php

function flash($title=null, $message=null)
{
    $flash = new \App\Classes\Flash();
    
    if(! is_null($title)) {
        $flash->success($title, $message);
    }
    
    return $flash;
}