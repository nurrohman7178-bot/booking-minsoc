<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\History;


class HistoryController extends Controller
{
    public function index()
    {
        return view('pelanggan.history.index');
    }
}
