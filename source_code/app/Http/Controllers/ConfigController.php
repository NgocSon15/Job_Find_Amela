<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        return view('admin.config.list-config', compact('configs'));
    }
}
