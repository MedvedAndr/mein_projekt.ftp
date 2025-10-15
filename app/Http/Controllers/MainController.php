<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

// use App\Services\AssetsRepository;

class MainController extends Controller {
    public function index () {
        $template = [];

        $template[] = view('layout.start');
        $template[] = view('layout.headers.main');
        $template[] = view('main');
        $template[] = view('layout.footers.main');
        $template[] = view('layout.end');

        return implode('', $template);
    }
}