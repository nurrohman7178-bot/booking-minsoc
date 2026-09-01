<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaturan;


class PengaturanController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }
}
