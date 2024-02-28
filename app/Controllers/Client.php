<?php

namespace App\Controllers;

class Client extends BaseController
{
    public function index(): string
    {
        return view('Client/gestion-client');
    }
}
