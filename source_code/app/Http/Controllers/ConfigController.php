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

    public function update(Request $request)
    {   
        $request->validate([
            'content' => 'url'
        ]);
        $config_id = $request->id;
        $config = Config::find($config_id);
        $config->content= $request->content;
        $config->save();
        return 'success';
        
    }
}
