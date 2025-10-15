<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

// use App\Services\AssetsRepository;

class Main extends Controller {
    public function index () {
        $template = [];

        // $template[] = view('welcome');

        return implode('', $template);
    }
}