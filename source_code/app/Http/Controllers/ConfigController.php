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

    public function updateFooter(Request $request)
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

    public function updateBanner(Request $request)
    {
        $request->validate([
            'img' => 'nullable|image'
        ]);
        $banner = Config::find(3);
        $content = trim($banner->content);
        $content = explode('|',$content);
        $content[0] = $request->text;
        if($request->img){
            $file = $request->img;
            $originName = pathinfo($file->getClientOriginalName());
            $extension = $originName['extension'];
            $filename = $originName['filename'];
            $path = date('Ymdhis')."$filename.$extension";
            $file->move('jobfinderportal-master/assets/img/hero/', $path);
            $content[1] = $path;
        }
        $content = trim(implode('|', $content));
        $banner->content = $content;
        $banner->save();
        session()->flash('success', 'success');
        return redirect()->back();
    }
}
