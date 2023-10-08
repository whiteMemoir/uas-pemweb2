<?php

namespace App\Http\Controllers;

use App\Models\DataNasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index() {
        $data = DataNasabah::get();

        return view('nasabah.index', compact('data'));
    }

}
