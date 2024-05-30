<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataguru;

class guru extends Controller
{
    public function index () {
        $datagurus = Dataguru::get();
        return view('guru.index', compact('datagurus'));
    }
}
