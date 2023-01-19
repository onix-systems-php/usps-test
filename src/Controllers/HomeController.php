<?php

namespace App\Controllers;

use Core\DB;
use Core\View\Template;

class HomeController
{
    public function index(): Template
    {
        $greetings = DB::getConnection()->query("SELECT 'Hello World!!!'")->fetchColumn();

        return new Template('home', [
            'greetings' => $greetings,
        ]);
    }
}
