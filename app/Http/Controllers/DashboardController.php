<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index() {
        $movies = Movie::paginate(10);

        return view('dashboard', compact('movies'));
    }
}
