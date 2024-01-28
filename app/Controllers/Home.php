<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function putri(): string
    {
        return view('welcome_message');
    }
}
