<?php

namespace App\Http\Controllers;

class UnnamedExceptionController
{
    public function __invoke()
    {
        return view('unnamed-exception');
    }

    public function action()
    {
        return view('unnamed-exception');
    }
}
